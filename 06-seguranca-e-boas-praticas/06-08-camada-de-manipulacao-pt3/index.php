<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.08 - Camada de manipulação pt3");

require __DIR__ . "/../source/autoload.php";

/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);

$message = new \Source\Core\Message();

$email = "cursos@upinside.com.br";

if (!isEmail($email)) {
    echo $message->error("Email inválido");
} else {
    echo $message->success("Email válido");
}

$passwd = "1235647894634646464646498749798";

if (!isPassword($passwd)) {
    echo $message->error("Senha inválido");
} else {
    echo $message->success("Senha válido");
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump(url("/blog/titulo-artigo"), url("blog/titulo-artigo"));


if (empty($_GET)) {
    redirect("?f=true");
}


/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

$user = user()->load(1);

echo message()->error("É o Brian");

session()->set("user", $user);

var_dump($user, session()->all());


