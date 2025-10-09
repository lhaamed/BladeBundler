<?php

namespace lhaamed\BladeBundler\classes\linkBundle;

use lhaamed\BladeBundler\classes\linkBundle\partials\LinkItem;

class LinkBundle
{

    public string $each_link_style = 'btn-outline-secondary'; // we just collect class names here
    public array $links = [];


    public function __construct(string|null $newLinkStyle = null)
    {
        if ($newLinkStyle !== null) {
            $this->addClassStyle($newLinkStyle);
        };
    }

    public function clearStyle(?string $newClassName = null): void
    {
        if ($newClassName)
            $each_link_style = trim($newClassName);
    }

    public function addClassStyle(string $className): void
    {
        $this->each_link_style = trim($this->each_link_style) . ' ' . trim($className);
    }


    public function append(string $title, string $href, string|null $icon = null, array $config = []): static
    {

        $link = new LinkItem($title, $href, $icon,$config);
        $this->links[] = $link;
        return $this;
    }

    public function prepend(string $title, string $href, string|null $icon = null, array $config = []): static
    {
        $link = new LinkItem($title, $href, $icon,$config);
        array_unshift($this->links, $link);
        return $this;
    }


    public function removeLinkViaIndex(int $index): void
    {
        array_splice($this->links, $index, 1);
    }

    public function clear(): static
    {
        $this->links = [];
        return $this;
    }

}
