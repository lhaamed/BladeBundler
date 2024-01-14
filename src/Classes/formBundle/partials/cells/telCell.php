<?php

namespace BladeBundler\Classes\formBundle\partials\cells;

use BladeBundler\Classes\formBundle\partials\Cell;

class telCell extends Cell{

    public string $pattern = "09[0-9]{9}";

    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('tel',$name,$id,$config);
        $this->setPattern($config['pattern'] ?? null);
    }

    public function setPattern(?string $pattern = null)
    {

        if (!is_null($pattern)) $this->pattern = $pattern;
    }
}
