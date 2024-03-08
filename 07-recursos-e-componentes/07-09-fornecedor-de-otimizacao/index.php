<?php

use Source\Support\Seo;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.09 - Fornecedor de otimização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ optimizer ] https://packagist.org/packages/coffeecode/optimizer
 */
fullStackPHPClassSession("optimizer", __LINE__);

$seo = new Seo();
$seo->render(
    'Formação FSPHP',
    "Curso de PHP da Upinside",
    'https://upinside.com.br/fsphp',
    'https://upinside.com.br/fsphp/images/cover.jpg'
);

var_dump($seo->getOptimizer()->debug(), $seo->getOptimizer()->data()->title);