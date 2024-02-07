<?php

namespace BladeBundler\services;

use BladeBundler\classes\formBundle\FormBundle;
use BladeBundler\classes\formBundle\partials\cells\colorCell;
use BladeBundler\classes\formBundle\partials\cells\emailCell;
use BladeBundler\classes\formBundle\partials\cells\hiddenCell;
use BladeBundler\classes\formBundle\partials\cells\numberCell;
use BladeBundler\classes\formBundle\partials\cells\passwordCell;
use BladeBundler\classes\formBundle\partials\cells\telCell;
use BladeBundler\classes\formBundle\partials\cells\textareaCell;
use BladeBundler\classes\formBundle\partials\cells\textCell;
use BladeBundler\classes\listBundle\ListBundle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;





class BladeBundlerService
{


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


    public static function generateForm(?string $title, string $action, ?string $method = 'POST'): formBundle
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
        return get_class($object) == 'BladeBundler\classes\listBundle\ListBundle';
    }

    public static function isForm(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\classes\formBundle\FormBundle';
    }

    public static function isLinkBundle(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\classes\linkBundle\LinkBundle';
    }

    public static function isLink(mixed $object): bool
    {
        return get_class($object) == 'BladeBundler\classes\linkBundle\partials\LinkItem';
    }


    public static function isCell(mixed $object, string $type): bool
    {

        return match ($type) {
            'text' => $object instanceof textCell,
            'email' => $object instanceof emailCell,
            'password' => $object instanceof passwordCell,
            'number' => $object instanceof numberCell,
            'tel' => $object instanceof telCell,
            'textarea' => $object instanceof textareaCell,
            'color' => $object instanceof colorCell,
            'hidden' => $object instanceof hiddenCell,
            default => false,
        };
    }

    public static function isCellAny(mixed $object, array $types): bool
    {
        foreach ($types as $type) {
            if (self::isCell($object, $type) == true) return true;
        }
        return false;
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
