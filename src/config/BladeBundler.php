<?php
return [


    /*
    |--------------------------------------------------------------------------
    | BladeBundler Configuration
    |--------------------------------------------------------------------------
    |
    |   any kind of configurations are declared here.
    |   hcaptcha    (put your site key & secret key)
    |   recaptcha   (put your site key & secret key)
    |   gd
    |   default_theme in can select light,dark to select custom theme for your validation
    */
    'connection' => [
        'url' => env('APP_URL'),
        'captcha' => env('SECURITY_CAPTCHA', 'gd'),
        'default_theme' => 'light'
    ],

    'driver' => [
        'recaptcha' => [
            'SECURITY_RECAPTCHA_SITE_KEY' => env('SECURITY_RECAPTCHA_SITE_KEY'),
            'SECURITY_RECAPTCHA_SECRET_KEY' => env('SECURITY_RECAPTCHA_SECRET_KEY'),

        ],

        'hcaptcha' => [
            'SECURITY_HCAPTCHA_SITE_KEY' => env('SECURITY_HCAPTCHA_SITE_KEY'),
            'SECURITY_HCAPTCHA_SECRET_KEY' => env('SECURITY_HCAPTCHA_SECRET_KEY'),
        ],

        'gd' => [

        ],
    ],


];
