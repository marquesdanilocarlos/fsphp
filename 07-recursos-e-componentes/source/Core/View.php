<?php

namespace Source\Core;

use League\Plates\Engine;

class View
{
    private Engine $engine;

    public function __construct(string $path = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT)
    {
        $this->engine = new Engine($path, $ext);
    }

    public function addPath(string $name, string $path): self
    {
        $this->engine->addFolder($name, $path);
        return $this;
    }

    public function render(string $templateName, array $data): string
    {
        return $this->engine->render($templateName, $data);
    }

    public function getEngine(): Engine
    {
        return $this->engine;
    }
}