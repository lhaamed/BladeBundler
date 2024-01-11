<?php

namespace lhaamed\ViewBundler\Classes\formBundle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use lhaamed\ViewBundler\Classes\InitialBundle;

class searchFormBundle extends InitialBundle
{

    public function __construct(?string $title = null, Collection|LengthAwarePaginator|null $query = null)
    {
        parent::__construct($title);


    }
}
