<?php

namespace BladeBundler\classes\formBundle\partials;

use BladeBundler\BB;

class Cell {

    public string $name;
    public string $id;
    public string $type;
    public array $validTypes = ['hidden','input','number','password','tel','email','color','textarea','select','checkbox','file'];

    public ?string $label = null;
    public mixed $default = null;
    public string $placeholder = '';
    public string $class = '';
    public bool $required = false;
    public bool $disabled = false;
    public bool $reverse = false;



    function __construct(string $type,string $name, string $id,array $config = [])
    {
        $this->name = $name;
        $this->id = $id;

//        dd($config);

        $this->setType($type);
        $this->setLabel($config['label'] ?? null);
        $this->setDefault($config['default'] ?? null);
        $this->setPlaceholder($config['placeholder'] ?? null);
        $this->setClass($config['class'] ?? null);
        $this->setRequired($config['required'] ?? null);
        $this->setDisabled($config['disabled'] ?? null);
        $this->setReverse($config['reverse'] ?? null);
    }

    // SETTERS


    public function setType(string $type)
    {
        if (in_array($type,BB::getFormValidTypes('short_name'))) $this->type = $type;
    }

    public function setPlaceholder(?string $placeholder = null): void
    {
        if (!is_null($placeholder)) $this->placeholder = $placeholder;
    }

    /**
     * @param mixed|null $default
     * @return void
     */
    public function setDefault(mixed $default = null): void
    {
        $this->default = $default;
    }

    public function setLabel(?string $label = null): void
    {
        $this->label = $label;
    }

    public function setClass(?string $class = null): void
    {
        if (!is_null($class)) $this->class = $class;
    }

    public function setRequired(mixed $required = null): void
    {
        if (!is_null($required)) $this->required = !!$required;
    }
    public function setDisabled(mixed $disabled = null): void
    {
        if (!is_null($disabled)) $this->disabled = !!$disabled;
    }
    public function setReverse(mixed $reverse = null): void
    {
        if (!is_null($reverse)) $this->reverse = !!$reverse;
    }
}
