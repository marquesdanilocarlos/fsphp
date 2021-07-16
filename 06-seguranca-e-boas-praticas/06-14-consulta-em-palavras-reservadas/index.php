<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.14 - Consulta em palavras reservadas");

require __DIR__ . "/../source/autoload.php";

/*
 * [ query params ]
 */
fullStackPHPClassSession("query params", __LINE__);

$user = (new \Source\Models\User())->findById(4);

$user->document = 22.22;

$user->save();

var_dump($user);

$user = (new \Source\Models\User())->find("document=:document", "document=22.22");

var_dump($user);


$users = (new \Source\Models\User())->all(2, 5);

var_dump($users);
