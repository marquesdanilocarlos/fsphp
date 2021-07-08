<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.08 - Regra de negócio e modelo");

require __DIR__ . "/../source/autoload.php";

/*
 * [ layer ] Uma classe base que implementa os métodos de persitência e serve a todos os modelos.
 * essa é uma layer supertype.
 */
fullStackPHPClassSession("layer", __LINE__);

$model = new ReflectionClass(\Source\Database\Models\Model::class);

var_dump($model->getDefaultProperties(), $model->getMethods());

/*
 * [ model ] Cada rotina em um sistema tem uma regra de negócio. Um model serve para abstrair
 * essas rotinas se reponsabilizando pelas regras.
 */
fullStackPHPClassSession("model", __LINE__);

$user =  new \Source\Database\Models\UserModel();

var_dump($user, get_class_methods($user));
