<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class telCell extends Cell{

    public string $pattern = "(0|\+98)9[0-9]{9}";
    public string $pattern_title = "+989123456789 OR 09123456789";

    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('tel',$name,$id,$config);
        $this->setPattern($config['pattern'] ?? null,$config['pattern_title'] ?? null);
    }

    public function setPattern(?string $pattern = null,?string $pattern_title = null)
    {
        if (!is_null($pattern)) $this->pattern = $pattern;
        if (!is_null($pattern_title)) $this->pattern_title = $pattern_title;
    }
}
