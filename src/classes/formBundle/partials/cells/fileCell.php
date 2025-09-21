<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;

use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class fileCell extends Cell{


    public mixed $accept = null;

    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('file',$name,$id,$config);
    }


    public function setAccept(?string $accept = null): void
    {
        if (!is_null($accept)) $this->accept = $accept;
    }
}
