<?php

namespace lhaamed\BladeBundler\classes\formBundle;

use lhaamed\BladeBundler\classes\formBundle\partials\Section;
use lhaamed\BladeBundler\classes\InitialBundle;

class FormBundle extends InitialBundle
{

    public string $method, $action, $alter_method, $custom_html_tags = '', $each_section_default_class = '';
    public string $boundary_class = 'col-12';
    public bool $hasCSRF = true;
    public bool $support_file = true;
    public array $sections = [];
    public array $submit_button = [
        'custom_class' => '',
        'title' => 'ثبت و ذخیره'
    ];
    public string $mode = 'normal';
    private array $modes = ['normal', 'single-col'];

    public function __construct(?string $title, string $action, string|null $method = 'POST')
    {
        parent::__construct($title);
        $this->setAction($action);
        $this->setMethod($method);
        $this->hasCSRF = ($this->method !== 'GET');
    }


    function setHTMLTag($tags): void
    {
        $this->custom_html_tags = $tags;
    }

    function setMode($mode): static
    {
        if (in_array($mode, $this->modes)){

            if ($mode == 'normal'){
                $this->boundary_class = 'col-12';
            }elseif ($mode == 'single-col'){
                $this->boundary_class = 'col-xxl-5 col-xl-6 col-md-8 col-12 mx-auto';
            }
            $this->mode = $mode;
        }
        return $this;
    }

    public function isMode($mode): bool
    {
        return $this->mode == $mode;
    }

    private function setMethod(string $method): void
    {
        if (in_array(strtoupper($method), ['POST', 'GET', 'PUT', 'PATCH', 'DELETE'])) {
            if (in_array(strtoupper($method), ['POST', 'GET'])) {
                $this->method = $method;
            } else {
                $this->method = 'POST';
                $this->alter_method = $method;
            }
        }
    }

    private function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function setSubmitButton($title, $custom_class = null): void
    {
        $this->submit_button['title'] = $title;
        $this->submit_button['custom_class'] = $custom_class ?? '';
    }

    public function addCSRF()
    {
        $this->hasCSRF = true;
    }

    public function removeCSRF()
    {
        $this->hasCSRF = false;
    }

    public function addFileSupport()
    {
        $this->support_file = true;
    }

    public function removeFileSupport()
    {
        $this->support_file = false;
    }


    public function appendSection($name = null, $custom_class = null, $each_row_default_class = null): Section
    {
        $newSection = new Section($name, $custom_class, $each_row_default_class);
        $this->sections[] = $newSection;
        return $newSection;
    }

    public function prependSection($name = null, $custom_class = null, $each_row_default_class = null): Section
    {
        $newSection = new Section($name, $custom_class, $each_row_default_class);
        array_unshift($this->sections, $newSection);
        return $newSection;
    }

}
