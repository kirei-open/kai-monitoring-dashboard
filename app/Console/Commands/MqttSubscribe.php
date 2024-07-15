<?php

namespace App\Console\Commands;

use App\Models\Device;
use App\Models\Location;
use App\Models\Measurement;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Events\DeviceLocationBroadcast;
use App\Events\DeviceMeasurementBroadcast;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT topic';

    public function handle()
    {
        $client = MQTT::connection();

        $client->connect();

        // Subscribe to the first topic
        $client->subscribe('kai/measurement', function ($topic, $message) {

            $this->info("Received message on topic {$topic}: {$message}");

            $data = json_decode($message, true);

            if (isset($data['serial_number'], $data['datetime'], $data['key'], $data['value'], $data['unit'])) {

                $dataMeasurementBroadcast = (object)[
                    'device_id' => $data['serial_number'],
                    'datetime' => $data['datetime'],
                    'key' => $data['key'],
                    'value' => $data['value'],
                    'unit' => $data['unit']
                ];

                $measurementData = [
                    'device_id' => $data['serial_number'],
                    'datetime' => $data['datetime'],
                    'key' => $data['key'],
                    'value' => $data['value'],
                    'unit' => $data['unit']
                ];

                Measurement::create($measurementData);
                Device::where('serial_number', $data['serial_number'])->update([
                    'last_monitored_value' => json_encode($measurementData)
                ]);

                event(new DeviceMeasurementBroadcast($dataMeasurementBroadcast));
            } else {
                $this->error("Invalid message format: {$message}");
            }
        });

        // Subscribe to the second topic
        $client->subscribe('kai/location', function ($topic, $message) {
            $this->info("Received message on topic {$topic}: {$message}");

            $data = json_decode($message, true);

            if (isset($data['serial_number'], $data['datetime'], $data['longitude'], $data['latitude'])) {

                $longitude = floatval($data['longitude']);
                $latitude = floatval($data['longitude']);

                $location = DB::raw("ST_GeomFromText('POINT({$latitude} {$longitude})')");

                $dataLocationBroadcast = (object)[
                    'device_id' => $data['serial_number'],
                    'datetime' => $data['datetime'],
                    'longitude' => $data['longitude'],
                    'latitude' => $data['latitude']
                ];

                $locationData = [
                    'device_id' => $data['serial_number'],
                    'datetime' => $data['datetime'],
                    'point' => $location,
                ];

                Location::create($locationData);

                Device::where('serial_number', $data['serial_number'])->update([
                    'last_location' => $location,
                ]);

                event(new DeviceLocationBroadcast($dataLocationBroadcast));

                $this->info("Saved another measurement data for ID: {$data['id']}");
            } else {
                $this->error("Invalid message format: {$message}");
            }
        });

        // Keep the connection alive
        while (true) {
            $client->loop();
            sleep(1);
        }

        $client->disconnect();
    }
}
