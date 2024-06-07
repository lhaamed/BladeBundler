<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class checkboxCell extends Cell{



    public function __construct(string $name, string $id, array $config)
    {
        parent::__construct('select', $name, $id, $config);
    }
}
