<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.11 - Carregando e atualizando");

require __DIR__ . "/../source/autoload.php";

/*
 * [ save update ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save update", __LINE__);


$model = new \Source\Database\Models\UserModel();

$user = $model->load(5);
$user->first_name = "Carlinhos";
$user->last_name = "Maia ";

if ($user != $model->load(5)) {
    echo "<p class='trigger warning'>Atualizando</p>";
    $user->save();
} else {
    echo "<p class='trigger accept'>Já Atualizado</p>";
}

var_dump($user);
