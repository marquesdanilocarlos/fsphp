<?php

namespace Source\Interface;

interface UploadInterface
{
    public function image(array $image, string $name, int $width): ?string;

    public function file(array $file, string $name): ?string;

    public function media(array $media, string $name): ?string;

    public function remove(string $filePath): void;

    public function getMessage();
}