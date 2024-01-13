<?php

namespace BladeBundler\Classes\formBundle\partials\cells;

use BladeBundler\Classes\formBundle\partials\Cell;

class telCell extends Cell{


    public string $label;

    public function __construct(string $name, string $id,?string $label = null,?string $default = null)
    {
        parent::__construct('input',$name,$id);
    }
}
