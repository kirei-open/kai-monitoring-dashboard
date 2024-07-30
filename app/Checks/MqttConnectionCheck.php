<?php

namespace App\Checks;

use Exception;
use PhpMqtt\Client\MqttClient;
use Spatie\Health\Checks\Check;
use PhpMqtt\Client\Facades\MQTT;
use Spatie\Health\Checks\Result;
use PhpMqtt\Client\ConnectionSettings;

class MqttConnectionCheck extends Check
{
    public function run(): Result
    {
        $result = Result::make();
        try {
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
            $mqtt->connect($connectionSettings, true);
        } catch (Exception $e) {
            return $result->failed("Couldn't connect to MQTT Broker");
        }

        return $result->ok('Succesfully connected to MQTT Broker');
    }
}
