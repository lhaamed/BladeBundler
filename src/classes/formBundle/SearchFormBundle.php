<?php

namespace BladeBundler\classes\formBundle;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\URL;
use JetBrains\PhpStorm\Pure;
use BladeBundler\classes\InitialBundle;

class SearchFormBundle extends formBundle
{

    public array $submit_button = [
        'custom_class' => '',
        'title' => 'جستجو'
    ];

    public function __construct(string $title, string $action = null, string|null $method = 'GET')
    {
        if ($action == null) $action = URL::current();
        parent::__construct($title,$action,$method);
    }

}
