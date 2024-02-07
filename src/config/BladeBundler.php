<?php

use BladeBundler\classes\formBundle\partials\cells\textCell;

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

    'formBundler' => [
        'components'  => [
            'default' => [
                'text' => [
                    'class' => textCell::class
                ],
                'email',
                'password',
                'number',
                'tel',
                'textarea',
                'color',
                'hidden',
            ],
            'custom' => []
        ],
    ]


];
