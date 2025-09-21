<?php

namespace lhaamed\BladeBundler;

use lhaamed\BladeBundler\console\commands\MakeListMap;
use lhaamed\BladeBundler\services\BladeBundlerService;
use Illuminate\Support\ServiceProvider;
use function base_path;
use function config_path;

class BladeBundlerServiceProvider extends ServiceProvider
{
        public function register(): void
        {
//        $this->app->singleton('BB', function ($app) {
//            return BladeBundlerService::getInstance();
//        });

        $this->app->singleton('BB', function ($app) {
            return new BladeBundlerService();
        });
    }

    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/config/BladeBundler.php','BladeBundler');


        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeListMap::class,
            ]);
        }

        // Register the view namespace
        if (is_dir(resource_path('views/bundler'))) {
            // If views are published, load from published path
            $this->loadViewsFrom(resource_path('views/bundler'), 'BladeBundler');
        } else {
            // If views are not published, load from package default views
            $this->loadViewsFrom(__DIR__.'\views', 'BladeBundler');
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
