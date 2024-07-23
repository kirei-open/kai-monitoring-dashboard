<?php

namespace App\Checks;

use App\Events\TestEvent;
use Exception;
use Spatie\Health\Checks\Check;
use Spatie\Health\Checks\Result;

class ReverbConnectionCheck extends Check
{
    public function run(): Result
    {
        $result = Result::make();
        try {
            event(new TestEvent('test'));
        } catch (Exception $e) {
            return $result->failed("Laravel reverb is not working");
        }

        return $result->ok('Laravel reverb is working');
    }
}
