<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.03 - Gestão de dependências");

/*
 * [ get composer ]
 */
fullStackPHPClassSession("get composer", __LINE__);

require __DIR__ . "/../vendor/autoload.php";

var_dump(get_defined_constants(true)['user']);

$user = user()->findById(4);

var_dump($user);
