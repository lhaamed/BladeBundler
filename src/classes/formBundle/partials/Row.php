<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials;

use lhaamed\BladeBundler\BB;

class Row
{
    public ?string $custom_class = null;
    public ?string $each_cell_default_class = null;
    public array $cells = [];

    public function __construct(string|null $each_cell_default_class)
    {
        if (isset($each_cell_default_class)) {
            $this->setEachCellDefaultClass($each_cell_default_class);
        }
    }

    public function setCustomClass($custom_class): static
    {
        $this->custom_class = $custom_class;
        return $this;
    }

    public function setEachCellDefaultClass($custom_class): static
    {
        $this->each_cell_default_class = $custom_class;
        return $this;
    }

    public function appendHTML($HTML, $cell_custom_class = 'col-xxl-2 col-lg-2 col-md-12'): static
    {
        $this->cells[] = [
            'cell_custom_class' => $cell_custom_class,
            'type' => 'injection',
            'content' => $HTML
        ];
        return $this;
    }


    private function appendCell(Cell $cell): static
    {
        $this->cells[] = $cell;
        return $this;
    }

    private function prependCell(Cell $cell): static
    {
        array_unshift($this->cells, $cell);
        return $this;
    }

    public function appendInput(string $type, string $name, string $id, array $config = []): static
    {
        return $this->appendCell(BB::generateCell($type, $name, $id, $config));
    }

    public function prependInput(string $type, string $name, string $id, array $config = []): static
    {
        return $this->prependCell(BB::generateCell($type, $name, $id, $config));
    }
}
