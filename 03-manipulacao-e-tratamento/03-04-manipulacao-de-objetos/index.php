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

//var_dump($arrProfile, $objProfile);

echo "<p>{$arrProfile['name']} trabalha na {$arrProfile['company']}</p>";
echo "<p>{$objProfile->name} trabalha na {$objProfile->company}</p>";

$ceo = $objProfile;
unset($ceo->company);
var_dump($ceo);

$company = new stdClass();
$company->company = "UpInside";
$company->ceo = $ceo;
$company->manager = new stdClass();
$company->manager->name = "Kaue";
$company->manager->mail = "manager@upinside.com.br";

var_dump($company);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

class TestBase
{
    public $name = "teste";


    public static function teste()
    {
        return "teste";
    }
}

class Test extends TestBase
{

}

$test = new Test;
$date = new DateTime();

var_dump([
    "class" => get_class($test),
    "methods" => get_class_methods($test),
    "classAttributes" => get_class_vars('Test'),
    "objectAttributes" => get_object_vars($test),
    "parent" => get_parent_class($test),
    "subClass" => is_subclass_of($test, 'TestBase')
]);