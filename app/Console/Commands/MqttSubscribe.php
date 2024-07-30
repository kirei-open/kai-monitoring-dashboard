<?php

namespace App\Console\Commands;

use App\Models\Device;
use App\Models\Location;
use App\Models\Measurement;
use PhpMqtt\Client\MqttClient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use PhpMqtt\Client\ConnectionSettings;
use App\Events\DeviceLocationBroadcast;
use App\Events\DeviceMeasurementBroadcast;

class MqttSubscribe extends Command
{
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT topic';

    public function handle()
    {
        $server = env('MQTT_HOST', 'localhost');
        $port = env('MQTT_PORT', 1883);
        $username = env('MQTT_AUTH_USERNAME');
        $password = env('MQTT_AUTH_PASSWORD');

        $mqtt = new MqttClient($server, $port);

        $connectionSettings = (new ConnectionSettings)
            ->setUsername($username)
            ->setPassword($password)
            ->setConnectTimeout(3)
            ->setUseTls(false)
            ->setTlsSelfSignedAllowed(true);

        try {
            $mqtt->connect($connectionSettings, true);
            $this->info("Connected successfully");

            // Subscribe to the first topic
            $mqtt->subscribe('kai/measurement', function ($topic, $message) {
                $this->info("Received message on topic {$topic}: {$message}");

                $data = json_decode($message, true);

                if (isset($data['serial_number'], $data['datetime'], $data['key'], $data['value'], $data['unit'])) {
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

                    event(new DeviceMeasurementBroadcast((object) $measurementData));
                } else {
                    $this->error("Invalid message format: {$message}");
                }
            }, 0);

            // Subscribe to the second topic
            $mqtt->subscribe('kai/location', function ($topic, $message) {
                $this->info("Received message on topic {$topic}: {$message}");

                $data = json_decode($message, true);

                if (isset($data['serial_number'], $data['datetime'], $data['longitude'], $data['latitude'])) {
                    $longitude = floatval($data['longitude']);
                    $latitude = floatval($data['latitude']);

                    $location = DB::raw("ST_GeomFromText('POINT({$longitude} {$latitude})')");

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
                } else {
                    $this->error("Invalid message format: {$message}");
                }
            }, 0);

            // Keep the connection alive
            while (true) {
                $mqtt->loop(true);
                sleep(1);
            }

            $mqtt->disconnect();
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
