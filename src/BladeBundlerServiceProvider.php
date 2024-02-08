<?php

namespace BladeBundler;

use BladeBundler\services\BladeBundlerService;
use Illuminate\Support\ServiceProvider;
use function base_path;
use function config_path;

class BladeBundlerServiceProvider extends ServiceProvider
{


    public function register()
    {
//        $this->app->singleton('BB', function ($app) {
//            return BladeBundlerService::getInstance();
//        });

        $this->app->singleton('BB', function ($app) {
            return new BladeBundlerService();
        });
    }

    public function boot()
    {

        $this->mergeConfigFrom(__DIR__ . '/config/BladeBundler.php','BladeBundler');


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


}
