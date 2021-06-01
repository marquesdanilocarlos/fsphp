<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.09 - Membros de uma classe");

require __DIR__ . "/source/autoload.php";

/*
 * [ constantes ] http://php.net/manual/pt_BR/language.oop5.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);
use Source\Members\Config;

$config = new Config();

echo Config::COMPANY . "<br/>";
//echo Config::SECTOR . "<br/>";
//echo Config::DOMAIN . "<br/>";

$reflection = new ReflectionClass(Config::class);

var_dump($reflection, get_class_methods($reflection), $reflection->getConstants());

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

//$config::$company = "Upinside";
//$config::$domain = "upinside.com.br";
//$config::$sector = "Educação";

//$config::$sector = "Tecnologia";

var_dump($config, $reflection->getProperties(), $reflection->getStaticProperties());

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

Config::setConfig("Upinside", "upinside.com.br", "Educação");

var_dump($config, $reflection->getMethods(), $reflection->getStaticProperties());
/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

Trigger::show("Erro, tente novamente mais tarde!");
Trigger::show("Erro, tente novamente mais tarde!", Trigger::ERROR);
echo Trigger::push("Sucesso!", Trigger::ACCEPT);
echo Trigger::push("Sucesso!", "sucess");
