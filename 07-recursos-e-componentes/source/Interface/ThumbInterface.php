<?php

namespace Source\Interface;

interface ThumbInterface
{
    public function make(string $image, int $width, int $heigth = null): string;

    public function flush(string $image = null): void;

    public function getCropper();
}