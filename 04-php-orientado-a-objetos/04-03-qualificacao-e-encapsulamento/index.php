<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require_once __DIR__ . "/classes/Web/Template.php";
require_once __DIR__ . "/classes/App/Template.php";

$appTemplate = new \App\Template();
$webTemplate = new \Web\Template();

var_dump($appTemplate, $webTemplate);

use App\Template as AppTemplate;
use Web\Template as WebTemplate;

$appTemplate = new AppTemplate();
$webTemplate = new WebTemplate();

var_dump($appTemplate, $webTemplate);

/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);
require __DIR__ . "/sources/Qualified/User.php";

$user = new \Source\Qualified\User();

//Impossível, pois os atributos são privados
/*$user->firstName = "Danilo";
$user->lastName = "Marques";
$user->setFirstName("Danilo");
$user->setLastName("Marques");*/

echo "O email de {$user->getFirstName()} {$user->getLastName()} é {$user->getEmail()}";

var_dump($user);

/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

if (!$user->setUser("Danilo", "Marques", "marquesdanilocarlos")) {
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

var_dump($user);
