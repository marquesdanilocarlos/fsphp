<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$arrProfile = [
    "name" => "Robson",
    "company" => "Upinside",
    "mail" => "cursos@upinside.com.br"
];

$objProfile = (object)$arrProfile;

var_dump($arrProfile, $objProfile);

echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;

unset($ceo->company);

var_dump($ceo);

$company = new stdClass();
$company->company = "Upinside";
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = "Kaue";
$company->manager->mail = "kaue@upinside.com.br";

var_dump($company);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

$pdoException = new PDOException();

var_dump([
    "class" => get_class($pdoException),
    "methods" => get_class_methods($pdoException),
    "vars" => get_object_vars($pdoException),
    "parent" => get_parent_class($pdoException),
    "subclass" => is_subclass_of($pdoException, "Exception"),
         ]);
