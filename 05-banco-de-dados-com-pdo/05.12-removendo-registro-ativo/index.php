<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.12 - Removendo registro ativo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ destroy ] Deleta um registro ativo
 */
fullStackPHPClassSession("destroy", __LINE__);
$model = new \Source\Database\Models\UserModel();

$user = $model->load(10);

if ($user){
    $user->destroy();
}

var_dump($user);

/*
 * [ model destroy ] Deletar em cadeia
 */
fullStackPHPClassSession("model destroy", __LINE__);

$userList = $model->all(10, 10);

foreach ($userList as $user) {
    $user->destroy();
}


var_dump($userList);

