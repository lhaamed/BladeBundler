<?php

namespace BladeBundler\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use BladeBundler\Services\BladeBundlerService;

class BladeBundlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('BB', function ($app) {
            return new BladeBundlerService;
        });

        $this->mergeConfigFrom(__DIR__ . '\..\config\BladeBundler.php','BladeBundler');
    }

    public function boot()
    {
//        dd(__DIR__.'\\..\\view');
        $this->loadViewsFrom(__DIR__.'/../views','BladeBundler');

        $this->publishes([
            __DIR__ . '/../config/BladeBundler.php' => config_path('BladeBundler.php'),
        ],'config');

        $this->publishes([
            __DIR__ . '/../views' => base_path('resources/views/bundler'),
        ],'bundler-views');
    }

    public function configurePackage($package): void
    {
        $package->hasViews();
    }
}
