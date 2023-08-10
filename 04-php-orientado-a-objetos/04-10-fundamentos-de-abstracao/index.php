<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.10 - Fundamentos da abstração");

require __DIR__ . "/source/autoload.php";

/*
 * [ superclass ] É uma classe criada como modelo e regra para ser herdada por outras classes,
 * mas nunca para ser instanciada por um objeto.
 */
fullStackPHPClassSession("superclass", __LINE__);
$client = new \Source\App\User("Danilo", "Marques");
/*$account = new \Source\Bank\Account(
    "1600",
    "21654",
    $client,
    1000
);*/

var_dump($client);

/*
 * [ especialização ] É uma classe filha que implementa a superclasse e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.a", __LINE__);
$saving = new \Source\Bank\Saving(
    "4687",
    "89435",
    $client,
    100
);

var_dump($saving);

$saving->deposit(1000);
$saving->extract();
$saving->withdraw(163);
$saving->withdraw(1500);
$saving->extract();

/*
 * [ especialização ] É uma classe filha que implementa a superclass e se especializa
 * com suas prórpias rotinas
 */
fullStackPHPClassSession("especialização.b", __LINE__);
$current = new \Source\Bank\Current(
    "5487",
"8672",
$client,
1000,
1000);

var_dump($current);

$current->deposit(1000);
$current->withdraw(2000);
$current->extract();

$current->withdraw(500);
$current->extract();
