<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials\cells;


use lhaamed\BladeBundler\classes\formBundle\partials\Cell;

class switchCell extends Cell
{
    public array $list = [];
    public bool $is_multiple = false;

    public function __construct(string $name, string $id, array $config)
    {
        parent::__construct('switch',$name, $id, $config);
        $this->setList($config['list']);
        $this->setIsMultiple($config['is_multiple'] ?? false);
    }

    public function setList($list): void
    {
        $this->list = $list;
    }

    public function setIsMultiple(bool $value): void
    {
        $this->is_multiple = $value;
    }

    public function isMultiple(): bool
    {
        return $this->is_multiple;
    }

    public function isSingle(): bool
    {
        return !$this->is_multiple;
    }

    public function isListEmpty(): bool
    {
        return count($this->list) == 0;
    }

    public function isDefaultValue($key): bool
    {
        if (gettype($this->default) == 'string') {
            return $key == $this->default;
        } elseif (gettype($this->default) == 'array') {
            return in_array($key, $this->default);
        } else return false;
    }
}
