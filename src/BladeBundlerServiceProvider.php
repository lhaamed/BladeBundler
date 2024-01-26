<?php

namespace BladeBundler;

use BladeBundler\Services\BladeBundlerService;
use Illuminate\Support\ServiceProvider;
use function base_path;
use function config_path;

class BladeBundlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('BB', function ($app) {
            return new BladeBundlerService;
        });

        $this->mergeConfigFrom(__DIR__ . '/config/BladeBundler.php','BladeBundler');
    }

    public function boot()
    {
//        dd(__DIR__.'\\..\\view');
        $this->loadViewsFrom(__DIR__.'/views','BladeBundler');


        $this->publishes([
            __DIR__ . '/config/BladeBundler.php' => config_path('BladeBundler.php'),
        ],'config');

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/bundler'),
        ],'bundler-views');

        $this->publishes([
            __DIR__ . '/assets' => base_path('public/assets/bundler/js'),
        ],'bundler-assets');
    }

    public function configurePackage($package): void
    {
        $package->hasViews();
    }
}
