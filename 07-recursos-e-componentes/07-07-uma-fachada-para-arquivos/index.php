<?php

use Source\Support\Upload;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.07 - Uma fachada para arquivos");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ image ] Fachada para envio de imagens (jpg, png, gif)
 */
fullStackPHPClassSession("image", __LINE__);

$upload = new Upload();

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($post && $post['send'] === 'image') {
    $uploadResult = $upload->image($_FILES['file'], $post['name']);
    if ($uploadResult) {
        echo "<img src='{$uploadResult}' />";
    } else {
        echo $upload->getMessage();
    }
}

$formSend = "image";
require __DIR__ . "/form.php";


/*
 * [ file ] Fachada para envio de arquivos (pdf, docx, zip, etc)
 */
fullStackPHPClassSession("file", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($post && $post['send'] === 'file') {
    $uploadResult = $upload->file($_FILES['file'], $post['name']);
    if ($uploadResult) {
        echo "<a target='_blank' href='{$uploadResult}'>Ver aquivo</a>";
    } else {
        echo $upload->getMessage();
    }
}

$formSend = "file";
require __DIR__ . "/form.php";


/*
 * [ media ] Fachada para envio de midias (audio/video)
 */
fullStackPHPClassSession("media", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($post && $post['send'] === 'media') {
    $uploadResult = $upload->media($_FILES['file'], $post['name']);
    if ($uploadResult) {
        echo "<a target='_blank' href='{$uploadResult}'>Ver aquivo</a>";
    } else {
        echo $upload->getMessage();
    }
}

$formSend = "media";
require __DIR__ . "/form.php";


/*
 * [ remove ] Um método adicional
 */
fullStackPHPClassSession("remove", __LINE__);

$upload->remove(__DIR__ . "/../storage/uploads/file/2024/02/nome-do-arquivo.mp4");
