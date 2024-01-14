<?php

namespace BladeBundler\Classes\formBundle\partials\cells;

use BladeBundler\Classes\formBundle\partials\Cell;

class passwordCell extends Cell {

    public bool $show_switch = true;


    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('password',$name,$id,$config);
        $this->setShowSwitch($config['show_switch'] ?? null);
    }

    /**
     * @return bool
     */
    public function isShowSwitch(): bool
    {
        return $this->show_switch;
    }

    /**
     * @param bool $show_switch
     */
    public function setShowSwitch(?bool $show_switch = null): void
    {
        if (!is_null($show_switch)) $this->show_switch = $show_switch;
    }


}
