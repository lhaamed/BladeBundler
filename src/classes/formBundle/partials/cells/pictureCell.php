<?php

namespace BladeBundler\classes\formBundle\partials\cells;


class pictureCell extends fileCell
{

    public mixed $accept = null;
    public string $default_preview = "";
    public string $preview_id = "";

    public function __construct(string $name, string $id, array $config)
    {
        parent::__construct($name, $id, $config);
        $this->setPreviewId($config['preview_id']);
        $this->setDefaultPreview($config['default_preview']);
    }


    public function setPreviewId(string $preview_id): void
    {
        $this->preview_id = $preview_id;
    }

    public function setDefaultPreview(string $default_preview): void
    {
        $this->default_preview = $default_preview;
    }

}
