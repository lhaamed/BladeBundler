<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;

use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class checkboxCell extends Cell{

    public string $value;
    public string|null $show_label = null;

    public function __construct(string $name, string $id, array $config)
    {
        parent::__construct('checkbox', $name, $id, $config);
        $this->setShowLabel($config['show_label'] ?? null);
        $this->setValue($config['value']);
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function setShowLabel(mixed $show_label): void
    {
        $this->show_label = $show_label;
    }
}
