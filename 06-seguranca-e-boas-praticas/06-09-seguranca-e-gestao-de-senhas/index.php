<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.09 - Segurança e gestão de senhas");

require __DIR__ . "/../source/autoload.php";

session();

/*
 * [ password hashing ] Uma API PHP para gerenciamento de senhas de modo seguro.
 */
fullStackPHPClassSession("password hashing", __LINE__);
//$pass = password_hash(12345, PASSWORD_DEFAULT, ["cost" => 12]);
$pass = password_hash(12345, PASSWORD_DEFAULT);

var_dump($pass);

var_dump(
    password_get_info($pass),
    password_needs_rehash($pass, PASSWORD_DEFAULT, ["cost" => 10]),
    password_verify(123456, $pass)
);

/*
 * [ password saving ] Rotina de cadastro/atualização de senha
 */
fullStackPHPClassSession("password saving", __LINE__);

$user = (new \Source\Models\User())->load(1);

$user->password = $pass;
$user->save();

var_dump($user, password_verify(12345, $user->password));


/*
 * [ password verify ] Rotina de vetificação de senha
 */
fullStackPHPClassSession("password verify", __LINE__);

$login = (new \Source\Models\User())->find("robson1@email.com.br");

if (!$login) {
    echo message()->warning("Usuário não encontrado!");
} elseif (!password_verify(12345, $login->password)) {
    echo message()->warning("Senha não confere");
} else {
    $login->password = password_hash(12345, PASSWORD_DEFAULT);
    $login->save();

    session()->set("login", $login->getData());

    echo message()->success("Bem vindo(a), {$login->first_name}!");
}


/*
 * [ password handler ] Sintetizando uso de senhas
 */
fullStackPHPClassSession("password handler", __LINE__);

$pass = "123456789";

var_dump(
    $passwd = passwd($pass),
    passwdVerify($pass, $passwd),
    passwdRehash($passwd)
);
