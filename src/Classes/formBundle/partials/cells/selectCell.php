<?php

namespace BladeBundler\Classes\FormBundle\partials\cells;

use BladeBundler\Classes\FormBundle\partials\Cell;

class selectCell extends Cell{

    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('input',$name,$id,$config);
    }
}
