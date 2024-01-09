<?php

namespace lhaamed\ViewBundler;

use App\Services\ViewBundlerService;
use Illuminate\Support\ServiceProvider;

class ViewBundlerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('ViewBundler', function ($app) {
            return new ViewBundlerService();
        });
    }
}
