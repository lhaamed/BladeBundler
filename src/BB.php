<?php

namespace BladeBundler;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Facade;
use JetBrains\PhpStorm\Pure;
use BladeBundler\Classes\FormBundle\formBundle;
use BladeBundler\Classes\ListBundle\listBundle;
use function request;

class BB extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'BB';
    }

    public static function generateList(Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        $listBundle = new listBundle();
        return self::listGenerator($listBundle, $query, $QueryMap);
    }

    public static function regenerateList(listBundle $oldBundle, Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        return self::listGenerator($oldBundle, $query, $QueryMap);
    }

    private static function listGenerator(listBundle $oldBundle, $query, callable $QueryMap): listBundle
    {
        $listBundle = $QueryMap($oldBundle, $query);
        if ($query instanceof LengthAwarePaginator) {
            $pagination = $query->appends(request()->query())->links();
        } else {
            $pagination = null;
        }
        $listBundle->setTablePagination($pagination);
        $listBundle->clearRecords();
        return $listBundle;
    }


    #[Pure] public static function generateForm(?string $title, string $action,?string $method = 'POST'): formBundle
    {
        return new formBundle($title, $action, $method);
    }


    public static function getQueryItems(LengthAwarePaginator|Collection $query): array
    {
        if ($query instanceof LengthAwarePaginator) {
            return $query->items();
        } else {
            return $query->toArray();
        }
    }


    // STATUS CHECK FUNCTIONS


    public static function isList(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\Classes\ListBundle\listBundle';
    }

    public static function isForm(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\Classes\FormBundle\formBundle';
    }

    public static function isLinkBundle(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\Classes\LinkBundle\linkBundle';
    }

    public static function isLink(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\Classes\LinkBundle\partials\linkItem';
    }

    public static function renderLink(array $data): string
    {
        if (isset($data['title'])) $title = $data['title'];
        $icon = $data['icon'];
        if (isset($data['class'])) $class = $data['class']; else $class = null;
        if (isset($data['route'])) $route = $data['route'];
        $href = $data['href'];
        $target = $data['target'] ?? '_self';
        $rel = $data['rel'] ?? 'nofollow';


        $finalTitle = $icon ? view('fs.fs-icon', ['icon' => $icon])->render() : $title;
        $finalHref = $href ?? route($route);


        return "<a href='$finalHref' rel='$rel' target='$target' class='$class'>{$finalTitle}</a>";
    }
}
