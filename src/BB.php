<?php

namespace BladeBundler;



use BladeBundler\classes\formBundle\FormBundle;
use BladeBundler\classes\listBundle\ListBundle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Facade;

/**
 * @method static listBundle generateList(Collection|LengthAwarePaginator|null $query, callable $QueryMap)
 * @method static listBundle regenerateList(listBundle $oldBundle, Collection|LengthAwarePaginator|null $query, callable $QueryMap)
 *
 * @method static formBundle generateForm(?string $title, string $action, ?string $method = 'POST')
 * @method static array getQueryItems(LengthAwarePaginator|Collection $query)
 *
 * @method static bool isList(mixed $object)
 * @method static bool isForm(mixed $object)
 * @method static bool isLinkBundle(mixed $object)
 * @method static bool isLink(mixed $object)
 * @method static bool isCell(mixed $object, string $type)
 * @method static bool isCellAny(mixed $object, array $types)
 *
 * @method static string renderLink(array $data)
 *
 * @see \Barryvdh\Debugbar\LaravelDebugbar
 */
class BB extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'BB';
    }

}
