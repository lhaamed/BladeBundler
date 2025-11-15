<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;

use lhaamed\BladeBundler\BB;
use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class textCell extends Cell{


    public ?int $min = null;
    public ?int $max = null;
    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('text',$name,$id,$config);
        $this->setMax($config['max'] ?? null);
        $this->setMin($config['min'] ?? null);
    }


    public function setMax(int|null $max): void
    {
        if (!is_null($max)) $this->max = $max;
    }
    public function setMin(int|null $min): void
    {
        if (!is_null($min)) $this->min = $min;
    }

}
