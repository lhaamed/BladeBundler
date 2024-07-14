<?php

use lhaamed\BladeBundler\Classes\formBundle\FormBundle;

use lhaamed\BladeBundler\classes\formBundle\partials\cells\checkboxCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\colorCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\emailCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\fileCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\hiddenCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\numberCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\passwordCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\pictureCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\selectCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\telCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\textareaCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\textCell;

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
                hiddenCell::class => [
                    'short_name' => 'hidden',
                    'blade' => 'BladeBundler::formBundle.components.inputs.hidden',
                ],
                textCell::class => [
                    'short_name' => 'text',
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
                ],
                emailCell::class => [
                    'short_name' => 'email',
                    'blade' => 'BladeBundler::formBundle.components.inputs.text',
                ],
                textareaCell::class => [
                    'short_name' => 'textarea',
                    'blade' => 'BladeBundler::formBundle.components.inputs.textarea',
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
                colorCell::class => [
                    'short_name' => 'color',
                    'blade' => 'BladeBundler::formBundle.components.inputs.color',
                ],
                fileCell::class => [
                    'short_name' => 'file',
                    'blade' => 'BladeBundler::formBundle.components.inputs.file',
                ],
                pictureCell::class => [
                    'short_name' => 'picture',
                    'blade' => 'BladeBundler::formBundle.components.inputs.picture',
                ],
                selectCell::class => [
                    'short_name' => 'select',
                    'blade' => 'BladeBundler::formBundle.components.inputs.select'
                ],
                checkboxCell::class => [
                    'short_name' => 'checkbox',
                    'blade' => 'BladeBundler::formBundle.components.inputs.check-box'
                ],
            ],
            'custom' => []
        ],
    ]


];
