<?php

namespace BladeBundler\classes\formBundle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use JetBrains\PhpStorm\Pure;
use BladeBundler\classes\InitialBundle;

class SearchFormBundle extends formBundle
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
