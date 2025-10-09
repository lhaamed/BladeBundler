<?php

namespace lhaamed\BladeBundler\classes\breadcrumbBundle;

use lhaamed\BladeBundler\classes\formBundle\searchFormBundle;
use lhaamed\BladeBundler\classes\InitialBundle;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class BreadcrumbBundle extends InitialBundle
{
    /**
     * @var BreadcrumbItem[]
     */
    public array $items = [];

    function __construct(?string $title = null)
    {
        parent::__construct($title ?? 'breadcrumb Bundle');
    }


    function append(string $title, string|null $href = null, string|null $icon = null): static
    {
        $breadcrumbItem = new BreadcrumbItem($title, $href, $icon);
        $this->items[] = $breadcrumbItem;
        return $this;
    }

    function prepend(string $title, string|null $href = null, string|null $icon = null): static
    {
        $breadcrumbItem = new BreadcrumbItem($title, $href, $icon);
        array_unshift($this->items,$breadcrumbItem);
        return $this;
    }

    function clear(): static
    {
        $this->items = [];
        return $this;
    }
}
