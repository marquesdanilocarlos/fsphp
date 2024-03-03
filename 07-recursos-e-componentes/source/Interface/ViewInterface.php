<?php

namespace Source\Interface;

interface ViewInterface
{
    public function addPath(string $name, string $path): self;

    public function render(string $templateName, array $data): string;

    public function getEngine();
}