<?php

use Source\Core\Message;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.06 - Camada de manipulação pt1");

require __DIR__ . "/../source/autoload.php";

/*
 * [ string helpers ] Funções para sintetizar rotinas com strings
 */
fullStackPHPClassSession("string", __LINE__);

$string = "Essa é uma string, nela temos um under_score e guarda-chuva";
$message = new Message();

echo strSlug($string);

echo $message->info(strSlug($string));

echo $message->info(strStudlyCase($string));
echo $message->info(strCamelCase($string));
echo $message->info(strTitle($string));

echo $message->info(strLimitWords($string, 7));
echo $message->info(strLimitChars($string, 52));