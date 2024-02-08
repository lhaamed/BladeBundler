<?php

use BladeBundler\classes\formBundle\partials\cells\textCell;

return [


    /*
    |--------------------------------------------------------------------------
    | BladeBundler Configuration
    |--------------------------------------------------------------------------
    |
    | there are 2 main configuration for From and List bundles. So you can determine configs individually in each.
    */

    'form' => [
        'components'  => [
            'default' => [
                'text' => [
                    'class' => textCell::class,
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
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
