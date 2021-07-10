<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.07 - Camada de manipulação pt2");

require __DIR__ . "/../source/autoload.php";

/*
 * [ string helpers ] Funções para sintetizar rotinas com strings
 */
fullStackPHPClassSession("string", __LINE__);

$string = "Essa é uma string, nela temos um under_score e um guarda-chuva!";

$message = new \Source\Core\Message();

echo $message->info(strTitle($string));
echo $message->info(strLimitWords($string, 8));
echo $message->info(strLimitChars($string, 45));


