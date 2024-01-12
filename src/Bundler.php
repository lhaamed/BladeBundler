<?php

namespace ViewBundler;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Facade;
use ViewBundler\Classes\ListBundle\listBundle;
use function request;

class Bundler extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Bundler';
    }

    public static function generateList(Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        $listBundle = new listBundle('list Generator');
        return self::listGenerator($listBundle, $query, $QueryMap);
    }
    public static function regenerateList(listBundle $oldBundle,Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        return self::listGenerator($oldBundle, $query, $QueryMap);
    }
    private static function listGenerator(listBundle $oldBundle, $query, callable $QueryMap): listBundle
    {
        $listBundle = $oldBundle;
        $mappedData = $QueryMap($query);
        $listBundle->setTableHeader($mappedData['headers']);
        $listBundle->setTableRecords($mappedData['records']);
        $listBundle->setTitle($mappedData['title']);
        if ($query instanceof LengthAwarePaginator) {
            $pagination = $query->appends(request()->query())->links();
        } else {
            $pagination = null;
        }
        $listBundle->setTablePagination($pagination);
        $listBundle->clearRecords();
        return $listBundle;
    }


    public static function checkInstance(mixed $object,$checkValue): string
    {

        if (get_class($object) == 'ViewBundler\Classes\ListBundle\listBundle') {
            return 'list' == $checkValue;
        }else return get_class($object);
    }
}
