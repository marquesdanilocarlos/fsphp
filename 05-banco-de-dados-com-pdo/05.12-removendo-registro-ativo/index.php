<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.12 - Removendo registro ativo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ destroy ] Deleta um registro ativo
 */
fullStackPHPClassSession("destroy", __LINE__);

$model = new \Source\Model\User();

$user = $model->getById(28);
$user->destroy();

var_dump($user);


/*
 * [ model destroy ] Deletar em cadeia
 */
fullStackPHPClassSession("model destroy", __LINE__);

$list = $model->getAll(10, 10);

if ($list) {
    /**
     * @var \Source\Model\User $user
     */
    foreach ($list as $user) {
        $user->destroy();
    }
}

var_dump($list);


