<?php

namespace lhaamed\ViewBundler\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use lhaamed\ViewBundler\Services\ViewBundlerService;

class ViewBundlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('Bundler', function ($app) {
            return new ViewBundlerService;
        });
    }
}
