<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.04 - Acesso e controle de sessões");

require __DIR__ . "/../source/autoload.php";

/*
 * [ session ] Uma classe statless para manipulação de sessões
 */
fullStackPHPClassSession("session", __LINE__);

$session = new \Source\Core\Session();

$session->set('user', 1);

$session->regenerate();

$session->set("stats", ["name", "email", "address"]);

$session->unset("stats");

if (!$session->has("login")) {
    echo "<p>Logar-se!</p>";
    $user = (new \Source\Models\User())->load(1);
    $session->set("login", $user);
}

$session->unset("login");
var_dump(
    $session->all(),
    session_id()
);
