<?php

namespace BladeBundler\classes\formBundle\partials;

class Section {

    public ?string $title;
    public ?string $custom_class = null;
    public ?string $custom_id = null;
    public ?string $each_row_default_class = null;
    public array $rows = [];

    function __construct(?string $title, ?string $custom_class, ?string $each_row_default_class)
    {
        $this->setTitle($title);
        $this->custom_class = $custom_class;
        $this->each_row_default_class = $each_row_default_class;
    }


    function setCustomClass($custom_class): static
    {
        $this->custom_class = $custom_class;
        return $this;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function removeTitle(){
        $this->title = null;
    }

    function appendRow(string|null $each_cell_default_class = 'col-xxl-3 col-xl-4 col-lg-6 col-md-12'): Row
    {
        $newRow = new Row($each_cell_default_class);
        $this->rows[] = $newRow;
        return $newRow;
    }

    function prependRow(string $each_cell_default_class = 'col-xxl-3 col-xl-4 col-lg-6 col-md-12'): Row
    {
        $newRow = new Row($each_cell_default_class);
        array_unshift($this->rows,$newRow);
        return $newRow;
    }

    function injectHTML($HTML): static
    {
        $this->rows = [$HTML];
        return $this;
    }


}
