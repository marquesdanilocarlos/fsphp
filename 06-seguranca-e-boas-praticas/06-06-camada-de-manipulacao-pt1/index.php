<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.06 - Camada de manipulação pt1");

require __DIR__ . "/../source/autoload.php";

/*
 * [ string helpers ] Funções para sintetizar rotinas com strings
 */
fullStackPHPClassSession("string", __LINE__);

$string = "Essa é uma string, nela temos um unser_score e um guarda-chuva!<script></script>";

$message = new \Source\Core\Message();


echo $message->info(strSlug($string));
echo $message->info(strStudlyCase($string));
echo $message->info(strCamelCase($string));
