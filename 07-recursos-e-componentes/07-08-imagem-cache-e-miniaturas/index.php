<?php

use Source\Support\Thumb;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.08 - Imagem, cache e miniaturas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ cropper ] https://packagist.org/packages/coffeecode/cropper
 */
fullStackPHPClassSession("cropper", __LINE__);

$thumb = new Thumb();

var_dump($thumb);

/*
 * [ generate ]
 */
fullStackPHPClassSession("generate", __LINE__);

echo "<img src='{$thumb->make("image/2024/02/nome-do-arquivo.jpg", 300)}' alt='imagem'/>";
echo "<img src='{$thumb->make("image/2024/02/nome-do-arquivo.jpg", 180, 180)}' alt='imagem'/>";

$thumb->flush("image/2024/02/nome-do-arquivo.jpg");