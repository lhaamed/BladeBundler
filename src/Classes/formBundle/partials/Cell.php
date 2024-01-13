<?php

namespace BladeBundler\Classes\formBundle\partials;

class Cell {

    public string $name;
    public string $id;
    public string $type;
    public array $validTypes = ['hidden','input','number','password','tel','email','color','textarea','select','checkbox','file'];

    public mixed $default = null;
    public string|null $custom_class = '';

    public string $placeholder = '';
    public string $class = '';
    public bool $required = false;
    public bool $disabled = false;
    public bool $reverse_dir = false;



    function __construct(string $type,string $name, string $id)
    {
        $this->name = $name;
        $this->id = $id;

        if (in_array($type,$this->validTypes)){
            $this->type = $type;
        }

//        if (isset($data['type'])) $this->type = $data['type'];
//        if (isset($data['placeholder'])) $this->placeholder = $data['placeholder'];
//        if (isset($data['class'])) $this->class = $data['class'];
//        if (isset($data['required'])) $this->required =!!$data['required'];
//        if (isset($data['disabled'])) $this->disabled = !!$data['disabled'];
//        if (isset($data['reverse_dir'])) $this->reverse_dir = !!$data['reverse_dir'];
    }

    /**
     * @return string
     */
}
