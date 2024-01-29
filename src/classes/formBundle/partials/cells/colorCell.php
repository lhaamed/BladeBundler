<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class colorCell extends Cell{

    public function __construct(string $name, string $id,?string $label = null,?string $default = null)
    {
        parent::__construct('input',$name,$id);
    }
}
