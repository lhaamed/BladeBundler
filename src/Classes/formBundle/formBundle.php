<?php

namespace ViewBundler\Classes\formBundle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use JetBrains\PhpStorm\Pure;
use ViewBundler\Classes\InitialBundle;

class formBundle extends InitialBundle
{

    #[Pure] public function __construct(?string $title = null)
    {
        parent::__construct($title);
    }

}
