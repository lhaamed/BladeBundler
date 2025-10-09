<?php

namespace lhaamed\BladeBundler\classes\breadcrumbBundle;

use lhaamed\BladeBundler\classes\formBundle\searchFormBundle;
use lhaamed\BladeBundler\classes\InitialBundle;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BreadcrumbItem
{

    public string $title;
    public string|null $href = null;
    public string|null $icon = null;

    public function __construct(string $title, string|null $href = null, string|null $icon = null)
    {
        $this->title = $title;
        $this->href = $href;
        $this->icon = $icon;
    }

}
