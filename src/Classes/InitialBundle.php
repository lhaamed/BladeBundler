<?php

namespace BladeBundler\Classes;

use BladeBundler\Classes\LinkBundle\linkBundle;

class InitialBundle  {

    public string $title = 'Bundle Title';
    public LinkBundle $links;

    public function __construct(?string $title = null){
        if (!is_null($title)) $this->title = $title;
        $this->links = new linkBundle('btn-sm');
    }

    public function setTitle(?string $title = null): static
    {
        if (!is_null($title)) $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
