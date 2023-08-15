<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.11 - Carregando e atualizando");

require __DIR__ . "/../source/autoload.php";

/*
 * [ save update ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save update", __LINE__);

$model = new \Source\Model\User();

$user = $model->getById(4);
$user->first_name = "Papoulos";
$user->last_name = "Pinto";


if ($user != $model->getById(4)) {
    echo "<p class='trigger warning'>Atualizando...</p>";
    $user->save();
} else {
    echo "<p class='trigger accept'>Já está atualizado!</p>";
}

var_dump($user);


