<?php

namespace lhaamed\BladeBundler\services;

use lhaamed\BladeBundler\classes\formBundle\FormBundle;
use lhaamed\BladeBundler\classes\formBundle\partials\Cell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\checkboxCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\colorCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\emailCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\fileCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\hiddenCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\numberCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\passwordCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\pictureCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\selectCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\telCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\textareaCell;
use lhaamed\BladeBundler\classes\formBundle\partials\cells\textCell;
use lhaamed\BladeBundler\classes\listBundle\ListBundle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use lhaamed\LaraFs\FS;


class BladeBundlerService
{

    public function getQueryItems(LengthAwarePaginator|Collection $query): array
    {
        if ($query instanceof LengthAwarePaginator) {
            return $query->items();
        } else {
            return $query->toArray();
        }
    }

    public function generateList(Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        $listBundle = new listBundle();

        $finalBundle = self::listGenerator($listBundle, $query, $QueryMap);
//        $this->bundles[] = $finalBundle;
        return $finalBundle;
    }

    public function regenerateList(listBundle $oldBundle, Collection|LengthAwarePaginator|null $query, callable $QueryMap): listBundle
    {
        return self::listGenerator($oldBundle, $query, $QueryMap);
    }

    private function listGenerator(listBundle $oldBundle, $query, callable $QueryMap): listBundle
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


    public function generateForm(?string $title, string $action, ?string $method = 'POST'): formBundle
    {
        return new formBundle($title, $action, $method);
    }


    public function renderLink(array $data): string
    {
        $title = $data['title'] ?? null;
        $icon = $data['icon'] ?? null;
        if (isset($data['class'])) $class = $data['class']; else $class = null;
        if (isset($data['route'])) $route = $data['route'];
        $href = $data['href'];
        $target = $data['target'] ?? '_self';
        $rel = $data['rel'] ?? 'nofollow';

        $finalHref = $href ?? route($route);

        if (class_exists("lhaamed\\LaraFs\\LaraFsService") && !is_null($icon)){
            $renderedIcon = FS::render($icon);
            return "<a href='$finalHref' rel='$rel' target='$target' class='$class' title='$title'>{$renderedIcon}</a>";

        }else{
            return "<a href='$finalHref' rel='$rel' target='$target' class='$class'>{$title}</a>";
        }



    }

    // STATUS CHECK FUNCTIONS


    public function isList(mixed $object): bool
    {
        return get_class($object) == 'lhaamed\BladeBundler\classes\listBundle\ListBundle';
    }

    public function isForm(mixed $object): bool
    {
        return get_class($object) == 'lhaamed\BladeBundler\classes\formBundle\FormBundle';
    }

    public function isLinkBundle(mixed $object): bool
    {
        return get_class($object) == 'lhaamed\BladeBundler\classes\linkBundle\LinkBundle';
    }

    public function isLink(mixed $object): bool
    {
        return get_class($object) == 'lhaamed\BladeBundler\classes\linkBundle\partials\LinkItem';
    }

    public function isCell(mixed $object, string $type): bool
    {

        return match ($type) {
            'hidden' => $object instanceof hiddenCell,
            'text' => $object instanceof textCell,
            'email' => $object instanceof emailCell,
            'textarea' => $object instanceof textareaCell,
            'tel' => $object instanceof telCell,
            'password' => $object instanceof passwordCell,
            'number' => $object instanceof numberCell,
            'color' => $object instanceof colorCell,
            'file' => $object instanceof fileCell,
            'picture' => $object instanceof pictureCell,
            'select' => $object instanceof selectCell,
            'checkbox' => $object instanceof checkboxCell,
            'cell' => $object instanceof Cell,
            default => false,
        };
    }

    public function isCellAny(mixed $object, array $types): bool
    {
        foreach ($types as $type) {
            if (self::isCell($object, $type) == true) return true;
        }
        return false;
    }

    public function getFormValidTypes(?string $flag = null): array
    {
        $defaultTypes = config('BladeBundler.form.components.default');
        $customTypes = config('BladeBundler.form.components.custom');
        $allTypes = array_merge($defaultTypes, $customTypes);

        if ($flag == 'short_name') {
            $allTypes = array_merge($defaultTypes, $customTypes);

            return array_map(function ($each) {
                return $each['short_name'];
            }, $allTypes);
        } elseif ($flag == 'blade') {
            return array_map(function ($each) {
                return $each['blade'];
            }, $allTypes);
        } else {
            return array_keys($allTypes);
        }

    }


    public function isCellDefined(Cell $cell): bool
    {
        return in_array(get_class($cell), $this->getFormValidTypes());
    }

    public function getCellConfig(Cell $cell)
    {

    }

    public function showFormCell(Cell $cell): null|string
    {
        if ($cell->type == 'checkbox'){
            dd('salam');
        }
        if ($this->isCellDefined($cell)) {
            return view($this->getFormValidTypes('blade')[get_class($cell)], ['cell' => $cell])->render();
        }
        return null;
    }


}
