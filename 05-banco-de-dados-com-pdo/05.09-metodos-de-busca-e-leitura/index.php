<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.09 - Métodos de busca e leitura");

require __DIR__ . "/../source/autoload.php";

/*
 * [ load ] Por primary key (id)
 */
fullStackPHPClassSession("load", __LINE__);
$model = new \Source\Model\User();
$user = $model->getById(1);

echo $user->first_name;

var_dump($user);

/*
 * [ find ] Por indexes da tabela (email)
 */
fullStackPHPClassSession("find", __LINE__);
$user = $user->getByEmail("elton35@email.com.br");

var_dump($user);


/*
 * [ all ] Retorna diversos registros
 */
fullStackPHPClassSession("all", __LINE__);
$users = $user->getAll(3, 2);

/**
 * @var \Source\Model\User
 */
foreach ($users as $user) {
    echo "Este é o usuário {$user->first_name} {$user->last_name} e seu email é : {$user->email} <br/>";
}

