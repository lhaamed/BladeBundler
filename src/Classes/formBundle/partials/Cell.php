<?php

namespace ViewBundler\Classes\formBundle\partials;

class Cell {

    public string $label;
    public string $name;
    public string $id;
    public string $type = 'text';
    public string $placeholder = '';
    public string $class = '';
    public bool $required = false;
    public bool $disabled = false;
    public bool $reverse_dir = false;



    function __construct(array $data)
    {

        $this->label = $data['label'];
        $this->name = $data['name'];
        $this->id = $data['id'];

        if (isset($data['type'])) $this->type = $data['type'];
        if (isset($data['placeholder'])) $this->placeholder = $data['placeholder'];
        if (isset($data['class'])) $this->class = $data['class'];
        if (isset($data['required'])) $this->required =!!$data['required'];
        if (isset($data['disabled'])) $this->disabled = !!$data['disabled'];
        if (isset($data['reverse_dir'])) $this->reverse_dir = !!$data['reverse_dir'];
    }
}
