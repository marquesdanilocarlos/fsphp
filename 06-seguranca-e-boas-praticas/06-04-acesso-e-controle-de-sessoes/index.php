<?php

use Source\Core\Session;

require __DIR__ . "/../source/autoload.php";

$session = new Session();

$session->set("user", 1);
$session->regenerate();

$session->set("stats", ['name', 'email']);

$session->unset('user');

if (!$session->has('login')) {
    echo '<h1>Logar-se</h1>';
    $user = (new \Source\Model\User())->getById(10);
    $session->set('login', $user);
}

$session->destroy();

var_dump($_SESSION, $session->all());

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);