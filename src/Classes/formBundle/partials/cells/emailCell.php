<?php

namespace BladeBundler\Classes\formBundle\partials\cells;

use BladeBundler\Classes\formBundle\partials\Cell;

class emailCell extends Cell{



    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('email',$name,$id,$config);
    }
}
