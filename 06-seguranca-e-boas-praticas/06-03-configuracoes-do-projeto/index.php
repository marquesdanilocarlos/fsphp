<?php

use Source\Core\Connection;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.03 - Configurações do projeto");

require __DIR__ . "/../source/autoload.php";

/*
 * [ configurações ] Um acesso global a tudo que pode ser configurado no projeto.
 */
fullStackPHPClassSession("configurações", __LINE__);
var_dump(get_defined_constants(true)['user']);


/*
 * [ refatoramento ] Iniciando o desenvolvimento de uma arquitetura de projeto.
 */
fullStackPHPClassSession("refatoramento", __LINE__);

$connection = Connection::getInstance()->prepare("SELECT * FROM users LIMIT 1");
$connection->execute();
var_dump($connection->fetchAll());

$user = (new \Source\Model\User())->getById(23);
var_dump($user);

$user->destroy();
var_dump($user);


