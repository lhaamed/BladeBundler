<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class hiddenCell extends Cell{



    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('hidden',$name,$id,$config);
    }
}
