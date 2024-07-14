<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;

use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class colorCell extends Cell{

    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('color',$name,$id,$config);
    }
}
