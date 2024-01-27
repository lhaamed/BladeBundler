<?php

namespace BladeBundler\Classes\FormBundle\partials\cells;

use BladeBundler\Classes\FormBundle\partials\Cell;

class textareaCell extends Cell{

    public int $rows = 6;
    public int $cols = 8;
    public ?int $min = null;
    public int $max = 120;


    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('textarea',$name,$id,$config);
        $this->setRows($config['rows'] ?? null);
        $this->setCols($config['cols'] ?? null);
        $this->setMin($config['min'] ?? null);
        $this->setMax($config['max'] ?? null);
    }

    public function setCols(?int $cols = null): void
    {
        if (!is_null($cols)) $this->cols = $cols;
    }
    public function setRows(?int $rows = null): void
    {
        if (!is_null($rows)) $this->rows = $rows;
    }
    public function setMax(?int $max = null): void
    {
        if (!is_null($max)) $this->max = $max;
    }
    public function setMin(?int $min = null): void
    {
        if (!is_null($min)) $this->min = $min;
    }
}
