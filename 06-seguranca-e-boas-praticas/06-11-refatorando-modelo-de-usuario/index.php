<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.11 - Refatorando modelo de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ find ]
 */
fullStackPHPClassSession("find", __LINE__);

$model = new \Source\Models\User();

$user = $model->find("id = :id", "id=1");

var_dump($user);


/*
 * [ find by id ]
 */
fullStackPHPClassSession("find by id", __LINE__);

$user = $model->findById(4);

var_dump($user);


/*
 * [ find by email ]
 */
fullStackPHPClassSession("find by email", __LINE__);

$user = $model->findByEmail("robson1@email.com.br");

var_dump($user);

/*
 * [ all ]
 */
fullStackPHPClassSession("all", __LINE__);

$users = $model->all(2, 5);

var_dump($users);


/*
 * [ save ]
 */
fullStackPHPClassSession("save create", __LINE__);

$user = $model->bootstrap("Danilo", "Villa", "danvilla@gmail.com", "a654321");

if ($user->save()) {
    echo message()->success("Cadastro realizado com sucesso!");
} else {
    echo $user->getMessage();
    echo message()->info($user->getMessage()->json());
}


/*
 * [ save update ]
 */
fullStackPHPClassSession("save update", __LINE__);

$user = (new \Source\Models\User())->findById(14);

$user->first_name = "Gustavo";
$user->last_name = "Web";
$user->password = "a123456";

if ($user->save()) {
    echo message()->success("Dados atualizados com sucesso!");
} else {
    echo $user->getMessage();
    echo message()->info($user->getMessage()->json());
}

var_dump($user);
