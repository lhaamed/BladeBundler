<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class checkboxCell extends Cell{

    public string $value;

    public function __construct(string $name, string $id, array $config)
    {
        parent::__construct('checkbox', $name, $id, $config);
        $this->setValue($config['value']);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
