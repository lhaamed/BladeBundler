<?php


namespace BladeBundler\Classes\LinkBundle\partials;


class linkItem
{
    public string $title;
    public string $href;

    public bool $disabled = false;
    public string $target = "_self";

    public string|null $icon = null;
    public string|null $rel = null;
    public string|null $type = null;
    public string|null $download = null;
    public string|null $custom_style = null;

    function __construct(string $title, string $href, string|null $icon = null, array $config = [])
    {
        $this->title = $title;
        $this->href = $href;
        $this->icon = $icon;
        if (array_search('style', $config)) $this->custom_style = $config['style'];
        if (array_search('rel', $config)) $this->rel = $config['rel'];
        if (array_search('download', $config)) $this->download = $config['download'];
        if (array_search('type', $config)) $this->type = $config['type'];
        if (array_search('target', $config)) $this->target = $config['target'];
        if (array_search('disabled', $config)) $this->disabled = boolval($config['disabled']);
    }
}

