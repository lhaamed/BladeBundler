<?php

namespace BladeBundler\Classes\formBundle\partials;

use BladeBundler\Classes\formBundle\partials\cells\numberCell;
use BladeBundler\Classes\formBundle\partials\cells\passwordCell;
use BladeBundler\Classes\formBundle\partials\cells\textareaCell;
use BladeBundler\Classes\formBundle\partials\cells\textCell;

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

    public function appendHTML($HTML, $cell_custom_class = 'col-xxl-2 col-lg-2 col-md-12 mb-2'): static
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

    private function generateCell(string $type,string $name,string $id, array $config): Cell
    {
        return match ($type) {
            'text' => new textCell($name, $id, $config),
            'number' => new numberCell($name, $id, $config),
            'textarea' => new textareaCell($name, $id, $config),
            'password' => new passwordCell($name, $id, $config),
            default => new Cell($type, $name, $id),
        };
    }




    public function appendInput(string $type,string $name,string $id, array $config): static
    {
        return $this->appendCell($this->generateCell($type,$name,$id,$config));
    }
    public function prependInput(string $type,string $name,string $id, array $config): static
    {
        return $this->prependCell($this->generateCell($type,$name,$id,$config));
    }
}
