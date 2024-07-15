<?php

namespace BladeBundler\classes\formBundle\partials\cells;

use BladeBundler\classes\formBundle\partials\Cell;

class passwordCell extends Cell {

    public bool $show_switch = false;


    public function __construct(string $name, string $id,array $config)
    {
        parent::__construct('password',$name,$id,$config);
        $this->setShowSwitch($config['show_switch'] ?? false);
    }


    /**
     * @param bool $show_switch
     */
    public function setShowSwitch(bool $show_switch): void
    {
        $this->show_switch = $show_switch;
    }


//    bool checkers
    public function shouldShowSwitch(): bool
    {
        return $this->show_switch;
    }
}
