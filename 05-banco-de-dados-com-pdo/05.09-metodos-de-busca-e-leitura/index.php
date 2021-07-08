<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);


$model = new \Source\Database\Models\UserModel();

$user = $model->load(1);

var_dump($user);

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);

$user = $model->find("leonardo36@email.com.br");

var_dump($user);


/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);

$users = $model->all(10, 5);

var_dump($users);

/**
 * @var \Source\Database\Models\UserModel $user
 */
foreach ($users as $user) {
    echo "{$user->first_name} {$user->lastName}";
    $user->save();
    var_dump($user);
}

