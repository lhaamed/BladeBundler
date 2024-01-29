<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class fileCell extends Cell{


    public function __construct(string $name, string $id,?string $label = null,?string $default = null)
    {
        $this->label = $label;
        $this->default = $default;
        parent::__construct('input',$name,$id);
    }
}
