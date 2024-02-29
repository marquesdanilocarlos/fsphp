<?php

namespace Source\Support;

use CoffeeCode\Uploader\Image;
use Source\Core\Message;

class Upload
{
    private Message $message;

    public function __construct()
    {
        $this->message = new Message();
    }

    public function image(array $image, string $name, int $width = CONF_IMG_SIZE): ?string
    {
        $upload = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMG_DIR);
        if (empty($image['type']) || !in_array($image['type'], $upload::isAllowed())) {
            $this->message->error('Você não selecionou uma imagem válida');
            return null;
        }

        return $upload->upload($image, $name, $width, CONF_IMG_QUALITY);
    }

    public function file()
    {
    }

    public function media()
    {
    }

    public function remove()
    {
    }

    public function getMessage(): Message
    {
        return $this->message;
    }

}