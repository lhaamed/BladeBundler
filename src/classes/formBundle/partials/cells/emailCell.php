<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;

use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class emailCell extends Cell{



    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('email',$name,$id,$config);
    }
}
