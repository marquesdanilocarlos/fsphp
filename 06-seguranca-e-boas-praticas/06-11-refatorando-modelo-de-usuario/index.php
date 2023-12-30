<?php

use Source\Model\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);
$model = new User();
$user = $model->find("id = :id", "id=1");

var_dump($user);


/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);
$user = $model->findById(10);

var_dump($user);

/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);
$user = $model->findByEmail('roniel46@email.com.br');
var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);
$users = $model->findAll(2);
var_dump($users);

/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);
$user = $model->bootstrap("Juvenal", "Lisinho", "juveliso@gmail.com", 97845631);


if ($user->save()) {
    echo message()->success("Cadastro Realizado com sucesso!");
} else {
    echo $user->getMessage();
}

/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);
$user = (new User())->findById(51);

$user->first_name = "Neymar";
$user->last_name = "Cai cai";
$password = "89645132";

if ($user->save()) {
    echo message()->success("Dados atualizados com sucesso!");
} else {
    echo $user->getMessage();
}