<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\MaintenanceModeManager;
use Illuminate\Contracts\Foundation\MaintenanceMode;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('files', function ($app) {
            return new Filesystem();
        });

        $this->app->singleton(MaintenanceMode::class, function ($app) {
            return new MaintenanceModeManager($app);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
