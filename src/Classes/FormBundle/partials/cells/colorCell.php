<?php

namespace BladeBundler\Classes\FormBundle\partials\cells;

use BladeBundler\Classes\FormBundle\partials\Cell;

class colorCell extends Cell{

    public function __construct(string $name, string $id,?string $label = null,?string $default = null)
    {
        parent::__construct('input',$name,$id);
    }
}
