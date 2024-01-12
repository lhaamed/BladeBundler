<?php

namespace ViewBundler\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use ViewBundler\Services\ViewBundlerService;

class ViewBundlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Bundler', function ($app) {
            return new ViewBundlerService;
        });

        $this->mergeConfigFrom(__DIR__ . '\..\config\ViewBundler.php','ViewBundler');
    }

    public function boot()
    {
//        dd(__DIR__.'\\..\\view');
        $this->loadViewsFrom(__DIR__.'/../views','ViewBundler');

        $this->publishes([
            __DIR__ . '/../config/ViewBundler.php' => config_path('ViewBundler.php'),
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
