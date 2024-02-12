<?php

use BladeBundler\Classes\formBundle\FormBundle;

use BladeBundler\classes\formBundle\partials\cells\colorCell;
use BladeBundler\classes\formBundle\partials\cells\emailCell;
use BladeBundler\classes\formBundle\partials\cells\hiddenCell;
use BladeBundler\classes\formBundle\partials\cells\numberCell;
use BladeBundler\classes\formBundle\partials\cells\passwordCell;
use BladeBundler\classes\formBundle\partials\cells\telCell;
use BladeBundler\classes\formBundle\partials\cells\textareaCell;
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

        'class' => FormBundle::class,
        'components'  => [
            'default' => [
                textCell::class => [
                    'short_name' => 'text',
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
                ],
                emailCell::class => [
                    'short_name' => 'email',
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
                ],
                telCell::class => [
                    'short_name' => 'tel',
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
                ],
                passwordCell::class => [
                    'short_name' => 'password',
                    'blade' => 'BladeBundler::formBundle.components.inputs.password',
                ],
                numberCell::class => [
                    'short_name' => 'number',
                    'blade' => 'BladeBundler::formBundle.components.inputs.number',
                ],
                textareaCell::class => [
                    'short_name' => 'textarea',
                    'blade' => 'BladeBundler::formBundle.components.inputs.textarea',
                ],
                colorCell::class => [
                    'short_name' => 'color',
                    'blade' => 'BladeBundler::formBundle.components.inputs.color',
                ],
                hiddenCell::class => [
                    'short_name' => 'hidden',
                    'blade' => 'BladeBundler::formBundle.components.inputs.hidden',
                ],
            ],
            'custom' => []
        ],
    ]


];
