<?php

namespace App\Providers;

use Spatie\Health\Facades\Health;
use App\Checks\MqttConnectionCheck;
use App\Checks\ReverbConnectionCheck;
use Illuminate\Support\ServiceProvider;
use Spatie\Health\Checks\Checks\PingCheck;
use Spatie\CpuLoadHealthCheck\CpuLoadCheck;
use Spatie\Health\Checks\Checks\DatabaseCheck;
use Spatie\Health\Checks\Checks\UsedDiskSpaceCheck;
use Spatie\Health\Checks\Checks\DatabaseTableSizeCheck;
use Spatie\Health\Checks\Checks\DatabaseConnectionCountCheck;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Health::checks([
            DatabaseCheck::new(),
            DatabaseConnectionCountCheck::new()
                ->failWhenMoreConnectionsThan(100),
            DatabaseTableSizeCheck::new()
                ->table('users', maxSizeInMb: 1_000)
                ->table('devices', maxSizeInMb: 2_000),
            MqttConnectionCheck::new()->label('MQTT Connection'),
            ReverbConnectionCheck::new()->label('Reverb Connection'),
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
