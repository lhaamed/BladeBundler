<?php

namespace BladeBundler\Classes\FormBundle\partials\cells;

use BladeBundler\Classes\FormBundle\partials\Cell;

class emailCell extends Cell{



    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('email',$name,$id,$config);
    }
}
