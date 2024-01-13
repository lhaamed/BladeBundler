<?php

namespace BladeBundler\Classes\formBundle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use JetBrains\PhpStorm\Pure;
use BladeBundler\Classes\InitialBundle;

class searchFormBundle extends formBundle
{

    #[Pure] public function __construct(?string $title = null)
    {
        parent::__construct($title);
    }

    #[Pure] public static function defaultFilterPattern(): searchFormBundle
    {
        return new self('search filter form');
    }
}
