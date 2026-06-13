<?php

namespace lhaamed\BladeBundler\classes;


use lhaamed\BladeBundler\classes\linkBundle\LinkBundle;

class InitialBundle  {

    public string|null $title = null;
    public LinkBundle $links;

    public function __construct(?string $title = null){
        if (!is_null($title)) $this->title = $title;
        $this->links = new LinkBundle('btn-sm');

        $this->links->prepend('بازگشت', 'javascript:history.back()', 'chevron-left');
    }

    public function setTitle(string|null $title = null): static
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string|null
    {
        return $this->title;
    }
}
