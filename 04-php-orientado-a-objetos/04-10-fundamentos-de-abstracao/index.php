<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);

$client = new \Source\App\User("Robson", "Leite");
//$account = new \Source\Bank\Account("1622",  "2462-7", $client, "1000");
//$account->extract();
//var_dump($account, $client);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);

$saving = new \Source\Bank\SavingAccount("2462-7", "26824-0", $client, 10000);

$saving->deposit(5000);
$saving->extract();
$saving->withdraw(20000);
$saving->withdraw(30);


var_dump($saving);

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);

$current = new \Source\Bank\CurrentAccount("2462-7", "26824-0", $client, 1000, 1000);

$current->deposit(500);

$current->withdraw(2000);
//$current->withdraw(500);

$current->extract();

var_dump($current);
