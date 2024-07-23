<?php

namespace App\Checks;

use Exception;
use Spatie\Health\Checks\Check;
use PhpMqtt\Client\Facades\MQTT;
use Spatie\Health\Checks\Result;

class CheckMqtt extends Check
{
    public function run(): Result
    {
        $result = Result::make();
        try {
            $client = MQTT::connection();
            $client->connect();
        } catch (Exception $e) {
            return $result->failed("Couldn't connect to MQTT Broker");
        }

        return $result->ok('Succesfully connected to MQTT Broker');
    }
}
