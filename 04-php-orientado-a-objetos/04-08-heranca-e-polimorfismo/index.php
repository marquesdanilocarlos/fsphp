<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);
$event = new \Source\Inheritance\Event\Event(
    "Workshop FSPHP",
    new DateTime("2024-01-22 16:00:00"),
    2500,
    3
);

$event->register("Danilo Marques", "marquesdanilocarlos@gmail.com");
$event->register("Juvenal Antena", "juvantena@gmail.com");
$event->register("Arlindo Cruz", "cruzlindo@gmail.com");
$event->register("João Matos", "matojoao@gmail.com");

var_dump($event);


/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);
$address = new \Source\Inheritance\Address(
    "Rua dos eventos",
    1287
);

$liveEvent = new \Source\Inheritance\Event\Live(
    "Workshop FSPHP",
    new DateTime("2024-01-22 16:00:00"),
    2500,
    3,
    $address
);

$liveEvent->register("Danilo Marques", "marquesdanilocarlos@gmail.com");
$liveEvent->register("Juvenal Antena", "juvantena@gmail.com");
$liveEvent->register("Arlindo Cruz", "cruzlindo@gmail.com");
$liveEvent->register("João Matos", "matojoao@gmail.com");

var_dump($liveEvent);

/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);
$onlineEvent = new \Source\Inheritance\Event\Online(
    "Workshop FSPHP",
    new DateTime("2024-01-22 16:00:00"),
    50,
    "https://upinside.com.br/workshop"
);

$onlineEvent->register("Danilo Marques", "marquesdanilocarlos@gmail.com");
$onlineEvent->register("Juvenal Antena", "juvantena@gmail.com");
$onlineEvent->register("Arlindo Cruz", "cruzlindo@gmail.com");
$onlineEvent->register("João Matos", "matojoao@gmail.com");

var_dump($onlineEvent);

