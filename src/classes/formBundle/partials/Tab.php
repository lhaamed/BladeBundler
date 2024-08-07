<?php

namespace BladeBundler\classes\formBundle\partials;

class Tab {

    public string $title;
    public ?string $custom_class = null;
    public string $unique_id;
    public ?string $each_section_default_class = null;
    public array $sections = [];

    function __construct(string $title,string $unique_id, ?string $custom_class = null, ?string $each_section_default_class = null)
    {
        $this->setTitle($title);
        $this->setID($unique_id);
        $this->custom_class = $custom_class;
        $this->each_section_default_class = $each_section_default_class;
    }


    function setCustomClass($custom_class): static
    {
        $this->custom_class = $custom_class;
        return $this;
    }

    function setTitle($title): void
    {
        $this->title = $title;
    }

    function setID($id): void
    {
        $this->unique_id = $id;
    }

    function appendSection(?string $title = null, ?string $custom_class = null, ?string $each_row_default_class = null): Section
    {
        $newSection = new Section($title, $custom_class, $each_row_default_class);
        $this->sections[] = $newSection;
        return $newSection;
    }

    function prependSection(?string $title = null, ?string $custom_class = null, ?string $each_row_default_class = null): Section
    {
        $newSection = new Section($title, $custom_class, $each_row_default_class);
        array_unshift($this->sections,$newSection);
        return $newSection;
    }

    function injectHTML($HTML): static
    {
        $this->sections = [$HTML];
        return $this;
    }

}
