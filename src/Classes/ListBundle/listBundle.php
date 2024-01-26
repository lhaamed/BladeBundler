<?php

namespace BladeBundler\Classes\ListBundle;

use BladeBundler\Classes\FormBundle\searchFormBundle;
use BladeBundler\Classes\InitialBundle;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class listBundle extends InitialBundle
{

    public array $table = [
        'headers' => [],
        'records' => null,
        'pagination' => null,
    ];
    private Collection|LengthAwarePaginator|null $records = null;
    public ?searchFormBundle $searchFormBundle = null;
    public string $emptyStateContent = '<tr class="text-center"><td colspan="50">موردی یافت نشد.</td></tr>';

    public function __construct(?string $title = null, Collection|LengthAwarePaginator|null $query = null)
    {
        parent::__construct($title ?? 'list Bundle');

        if (isset($query)) $this->setRecords($query);
        else $this->records = new Collection();
    }

    public function setRecords(Collection|LengthAwarePaginator $records): static
    {
        $this->records = $records;
        return $this;
    }

    public function setTableHeader(array $headers): static
    {
        $this->table['headers'] = $headers;
        return $this;
    }

    public function setTableRecords($records): static
    {
        $this->table['records'] = $records;
        return $this;
    }

    public function setTablePagination($pagination): static
    {
        $this->table['pagination'] = $pagination;
        return $this;
    }


    public function generateSearchForm(?callable $filterPattern = null): listBundle
    {
        if (isset($filterPattern)) {
            $searchFormBundle = $filterPattern();
        } else {
            $searchFormBundle = searchFormBundle::defaultFilterPattern();
        }
        $this->setSearchForm($searchFormBundle);
        return $this;
    }

    public function setSearchForm(searchFormBundle $searchFormBundle): static
    {
        $this->searchFormBundle = $searchFormBundle;
        return $this;
    }


    public function setEmptyListDefaultView(string $renderedContent): static
    {
        $this->emptyStateContent = $renderedContent;
        return $this;
    }

    public function clearRecords(): static
    {
        $this->records = null;
        return $this;
    }

    public function hasAnyRecordToShow(): bool
    {
        return count($this->table['records']) > 0;
    }

}
