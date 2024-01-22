<?php

namespace App\Providers;

use App\Services\MaintenanceService;
use Illuminate\Support\ServiceProvider;

class MaintenanceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MaintenanceService::class, function () {
            return MaintenanceService::getInstance();
        });
    }
}