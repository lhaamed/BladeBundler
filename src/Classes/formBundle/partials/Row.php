<?php

namespace ViewBundler\Classes\formBundle\partials;

class Row {
    public ?string $row_custom_class = null;
    public ?string $each_cell_default_class = null;
    public array $cells = [];

    function __construct(string|null $each_cell_default_class)
    {
        if (isset($each_cell_default_class)){
            $this->setEachCellDefaultClass($each_cell_default_class);
        }
    }

    function setCustomClass($custom_class): static
    {
        $this->row_custom_class = $custom_class;
        return $this;
    }

    function setEachCellDefaultClass($custom_class): static
    {
        $this->each_cell_default_class = $custom_class;
        return $this;
    }

    function appendCell(array $cell): static
    {
        $this->cells[] = $cell;
        return $this;
    }

    public function appendHTML($HTML, $cell_custom_class = 'col-xxl-2 col-lg-2 col-md-12 mb-2'): static
    {
        $this->cells[] = [
            'cell_custom_class' => $cell_custom_class,
            'type' => 'injection',
            'content' => $HTML
        ];
        return $this;
    }
    function prependCell(array $cell): static
    {
        array_unshift($this->cells,$cell);
        return $this;
    }
}
