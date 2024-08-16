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

        // Register the view namespace
        if (is_dir(resource_path('views/bundler'))) {
            // If views are published, load from published path
            $this->loadViewsFrom(resource_path('views/bundler'), 'BladeBundler');
        } else {
            // If views are not published, load from package default views
            $this->loadViewsFrom(__DIR__.'/views', 'BladeBundler');
        }

        $this->publishes([
            __DIR__ . '/config/BladeBundler.php' => config_path('BladeBundler.php'),
        ],['blade-bundler','config','bb:config']);

        $this->publishes([
            __DIR__ . '/views' => resource_path('views/bundler'),
        ],['blade-bundler','views','bb:views']);

        $this->publishes([
            __DIR__ . '/assets' => public_path('assets/bundler/js'),
        ],['blade-bundler','assets','bb:assets']);

    }


}
