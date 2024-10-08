<?php

namespace BladeBundler\classes\formBundle\partials;

use BladeBundler\BB;
use BladeBundler\classes\formBundle\partials\cells\checkboxCell;
use BladeBundler\classes\formBundle\partials\cells\colorCell;
use BladeBundler\classes\formBundle\partials\cells\emailCell;
use BladeBundler\classes\formBundle\partials\cells\fileCell;
use BladeBundler\classes\formBundle\partials\cells\hiddenCell;
use BladeBundler\classes\formBundle\partials\cells\numberCell;
use BladeBundler\classes\formBundle\partials\cells\passwordCell;
use BladeBundler\classes\formBundle\partials\cells\pictureCell;
use BladeBundler\classes\formBundle\partials\cells\selectCell;
use BladeBundler\classes\formBundle\partials\cells\switchCell;
use BladeBundler\classes\formBundle\partials\cells\telCell;
use BladeBundler\classes\formBundle\partials\cells\textareaCell;
use BladeBundler\classes\formBundle\partials\cells\textCell;

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

    private function generateCell(string $type,string $name,string $id, array $config): Cell
    {
        $all_valid_cells = BB::getFormValidTypes('short_name');

        if (in_array($type,$all_valid_cells)){
            $type_cell = array_search($type,$all_valid_cells);
            return new $type_cell($name, $id, $config);
        }else return new Cell($type, $name, $id);
        /*return match ($type) {
            'hidden' => new hiddenCell($name, $id, $config),
            'text' => new textCell($name, $id, $config),
            'email' => new emailCell($name, $id, $config),
            'textarea' => new textareaCell($name, $id, $config),
            'tel' => new telCell($name, $id, $config),
            'password' => new passwordCell($name, $id, $config),
            'number' => new numberCell($name, $id, $config),
            'color' => new colorCell($name, $id, $config),
            'file' => new fileCell($name, $id, $config),
            'picture' => new pictureCell($name, $id, $config),
            'select' => new selectCell($name, $id, $config),
            'switch' => new switchCell($name, $id, $config),
            'checkbox' => new checkboxCell($name, $id, $config),
            default => new Cell($type, $name, $id),
        };*/
    }

    public function appendInput(string $type,string $name,string $id, array $config = []): static
    {
        return $this->appendCell($this->generateCell($type,$name,$id,$config));
    }
    public function prependInput(string $type,string $name,string $id, array $config = []): static
    {
        return $this->prependCell($this->generateCell($type,$name,$id,$config));
    }
}
