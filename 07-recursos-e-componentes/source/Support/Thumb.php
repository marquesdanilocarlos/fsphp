<?php

namespace Source\Support;

use CoffeeCode\Cropper\Cropper;
use Source\Interface\ThumbInterface;

readonly class Thumb implements ThumbInterface
{

    public function __construct(
        private string $uploads = CONF_UPLOAD_DIR,
        private Cropper $cropper = new Cropper(CONF_IMG_CACHE, CONF_IMG_QUALITY['jpg'], CONF_IMG_QUALITY['png'])
    ) {
    }

    public function make(string $image, int $width, int $heigth = null): string
    {
        return $this->cropper->make("{$this->uploads}/{$image}", $width, $heigth);
    }

    public function flush(string $image = null): void
    {
        if ($image) {
            $this->cropper->flush("{$this->uploads}/{$image}");
            return;
        }

        $this->cropper->flush();
    }

    public function getCropper(): Cropper
    {
        return $this->cropper;
    }
}