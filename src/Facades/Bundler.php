<?php

namespace lhaamed\ViewBundler\Facades;

use Illuminate\Support\Facades\Facade;

class Bundler extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Bundler';
    }
}
