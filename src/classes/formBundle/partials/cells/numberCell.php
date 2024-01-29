<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class numberCell extends Cell{


    public float $step = 1;
    public ?float $min = null;
    public ?float $max = null;
    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('number',$name,$id,$config);
        $this->setMin($config['min'] ?? null);
        $this->setMax($config['max'] ?? null);
        $this->setStep($config['step'] ?? null);
    }

    public function setStep(?float $step = null): void
    {
        if (!is_null($step)) $this->step = $step;
    }
    public function setMin(?float $min = null): void
    {
        if (!is_null($min)) $this->min = $min;
    }
    public function setMax(?float $max = null): void
    {
        if (!is_null($max)) $this->max = $max;
    }

    // overrides
    public function setDefault(mixed $default = null): void
    {
        if (in_array(gettype($default),['integer','double'])) $this->default = $default;
    }
}
