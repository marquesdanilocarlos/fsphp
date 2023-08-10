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

echo "<p>" . $config::COMPANY . "</p>";

var_dump(
    $config,
    Config::COMPANY,
//Config::DOMAIN,
//Config::SECTOR
);

$reflection = new ReflectionClass(Config::class);

var_dump($reflection, $reflection->getConstants());

/*
 * [ propriedades ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("propriedades", __LINE__);

Config::$company = "UPINSIDE";
Config::$domain = "UPINSIDE.COM.BR";
Config::$sector = "EDUCAÇÃO";

var_dump($reflection->getProperties());

/*
 * [ métodos ] http://php.net/manual/pt_BR/language.oop5.static.php
 */
fullStackPHPClassSession("métodos", __LINE__);

$config::setConfig("Basis", "basis.com.br", "tecnologia");

var_dump($reflection->getStaticProperties());

/*
 * [ exemplo ] Uma classe trigger
 */
fullStackPHPClassSession("exemplo", __LINE__);

use Source\Members\Trigger;

$trigger = new Trigger();
$trigger::show("Um objeto trigger");

var_dump($trigger);

Trigger::show("Mensagem para o usuário");
Trigger::show("Mensagem para o usuário", Trigger::ACCEPT);
Trigger::show("Mensagem para o usuário", Trigger::WARNING);
Trigger::show("Mensagem para o usuário", Trigger::ERROR);

$message = Trigger::push("Esse é um retorno pro usuário", Trigger::WARNING);

echo $message;