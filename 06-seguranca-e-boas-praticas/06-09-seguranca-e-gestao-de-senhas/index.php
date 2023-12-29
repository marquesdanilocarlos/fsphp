<?php

require __DIR__ . "/../source/autoload.php";
session();
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);
//$pass = password_hash(12345, PASSWORD_DEFAULT, ['cost' => 12]);
$pass = password_hash(123456, PASSWORD_DEFAULT);
var_dump($pass);


var_dump([
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ['cost' => 10]),
    password_verify(12345, $pass)
]);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);
$user = (new \Source\Model\User())->getById(1);
$user->password = $pass;

var_dump(password_verify(123456, $user->password));

$user->save();

/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = (new \Source\Model\User())->getByEmail('robson1@email.com.br');

var_dump($login);

if (!$login) {
    echo message()->info('E-mail informado não confere.');
} elseif (!password_verify(123456, $login->password)) {
    echo message()->error('Senha informada não confere.');
} else {
    $login->password = password_hash(123456, PASSWORD_DEFAULT);
    $login->save();

    session()->set('login', $login->getData());
    echo message()->success("Bem vindo de volta {$login->first_name}");
}


/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = 1246543241;

var_dump([
    $passwd = passwd($pass),
    passwdVerify($pass, $passwd),
    passwdRehash($passwd)
]);
