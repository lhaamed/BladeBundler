<?php

namespace lhaamed\ViewBundler\Interfaces;

class InitialBundle  {

    public string $title = 'Pack Title';
//    public linkPack $links;

    public function __construct(?string $title = null){
        if (!is_null($title)) $this->title = $title;
//        $this->links = new linkPack('btn-sm');
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
