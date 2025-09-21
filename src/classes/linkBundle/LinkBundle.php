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


    public function appendLink(string $title, string $href, string|null $icon = null, array $config = []): void
    {

        $link = new LinkItem($title, $href, $icon,$config);
        $this->links[] = $link;
    }

    public function prependLink(string $title, string $href, string|null $icon = null, array $config = []): void
    {
        $link = new LinkItem($title, $href, $icon,$config);
        array_unshift($this->links, $link);
    }

    public function set($linksInArray)
    {
        $this->links = $linksInArray;
    }

    public function removeLinkViaIndex(int $index): void
    {
        array_splice($this->links, $index, 1);
    }

}
