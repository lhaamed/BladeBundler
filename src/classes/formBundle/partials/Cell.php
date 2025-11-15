<?php

namespace lhaamed\BladeBundler\classes\formBundle\partials;

use lhaamed\BladeBundler\BB;

class Cell
{

    public string $name;
    public string $id;
    public string $type;
    public array $validTypes = ['hidden', 'text', 'email', 'textarea', 'tel', 'password', 'number', 'color', 'file', 'select', 'checkbox'];
    public array $hints = [];
    public ?string $label = null;
    public ?string $icon = null;
    public mixed $default = null;
    public string $placeholder = '';
    public string $class = '';
    public string $input_class = '';
    public bool $required = false;
    public bool $disabled = false;
    public bool $reverse = false;


    function __construct(string $type, string $name, string $id, array $config = [])
    {
        $this->name = $name;
        $this->id = $id;

        $this->setType($type);
        $this->setLabel($config['label'] ?? null);
        $this->setIcon($config['icon'] ?? null);
        $this->setDefault($config['default'] ?? null);
        $this->setPlaceholder($config['placeholder'] ?? null);
        $this->setClass($config['class'] ?? null);
        $this->setInputClass($config['input_class'] ?? null);
        $this->setRequired($config['required'] ?? null);
        $this->setDisabled($config['disabled'] ?? null);
        $this->setReverse($config['reverse'] ?? null);
        if (array_key_exists('hints', $config)) $this->setHints($config['hints']);
    }

    // SETTERS


    public function setType(string $type): void
    {
        if (in_array($type, BB::getFormValidTypes('short_name'))) $this->type = $type;
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
        if (!is_array($default)) {
            $this->default = strval($default);
        } else {
            $this->default = $default;
        }
    }

    public function setLabel(?string $label = null): void
    {
        $this->label = $label;
    }

    public function setIcon(?string $icon = null): void
    {
        $this->icon = $icon;
    }

    public function setClass(?string $class = null): void
    {
        if (!is_null($class)) $this->class = $class;
    }

    public function setInputClass(?string $input_class = null): void
    {
        if (!is_null($input_class)) $this->input_class = $input_class;
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

    public function setHints(array $hints): void
    {
        $hintTypes = ['success', 'warning', 'danger', 'info', 'primary', 'secondary'];

        $validatedHints = [];
        foreach ($hints as $key => $hint) {

            if (is_string($hint)) {
                $validatedHints[] = [
                    'type' => 'secondary',
                    'content' => $hint
                ];
            } elseif (is_array($hint)) {
                if (!in_array($hint['type'], $hintTypes)) {
                    $hint['type'] = 'secondary';
                }
                $validatedHints[] = $hint;
            }
        }
        $this->hints = $validatedHints;
    }


//    bool checkers
    public function isRequired(): bool
    {
        return $this->required;
    }

    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    public function isReversed(): bool
    {
        return $this->reverse;
    }

    public function hasDefault(): bool
    {
        return isset($this->default);
    }

    public function hasHints(): bool
    {
        return !!count($this->hints);
    }
}
