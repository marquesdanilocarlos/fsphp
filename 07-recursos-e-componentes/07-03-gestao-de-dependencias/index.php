<?php

use Source\Model\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.03 - Gestão de dependências");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ get composer ]
 */
fullStackPHPClassSession("get composer", __LINE__);

$user = (user())->findById(1);

var_dump($user);
