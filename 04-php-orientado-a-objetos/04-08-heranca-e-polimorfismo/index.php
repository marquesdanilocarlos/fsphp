<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.08 - Herança e polimorfismo");

require __DIR__ . "/source/autoload.php";

/*
 * [ classe pai ] Uma classe que define o modelo base da estrutura da herança
 * http://php.net/manual/pt_BR/language.oop5.inheritance.php
 */
fullStackPHPClassSession("classe pai", __LINE__);

$event = new \Source\Heranca\Event\Event("Workshop FSPHP", new \DateTime('2021-06-12'), 1997.90, 4);

var_dump($event);

$event->register("Danilo", "danilo.marques@mcom.gov.br");
$event->register("Juvenal", "juve.cruz@mcom.gov.br");
$event->register("Arlindo", "lindo.antena@mcom.gov.br");
$event->register("Carlos", "carlos.chaves@mcom.gov.br");
$event->register("Tobias", "tobias.boon@mcom.gov.br");


/*
 * [ classe filha ] Uma classe que herda a classe pai e especializa seuas rotinas
 */
fullStackPHPClassSession("classe filha", __LINE__);

$liveEvent = new \Source\Heranca\Event\LiveEvent(
    "Workshop FSPHP",
    new \DateTime('2021-06-12'),
    1997.90,
    4,
    new \Source\Heranca\Address("QA 13 MR Casa", 8, "Setor Sul")
);

var_dump($liveEvent);

$liveEvent->register("Danilo", "danilo.marques@mcom.gov.br");
$liveEvent->register("Juvenal", "juve.cruz@mcom.gov.br");
$liveEvent->register("Arlindo", "lindo.antena@mcom.gov.br");
$liveEvent->register("Carlos", "carlos.chaves@mcom.gov.br");
$liveEvent->register("Tobias", "tobias.boon@mcom.gov.br");


/*
 * [ polimorfismo ] Uma classe filha que tem métodos iguais (mesmo nome e argumentos) a class
 * pai, mas altera o comportamento desses métodos para se especializar
 */
fullStackPHPClassSession("polimorfismo", __LINE__);

$onlineEvent = new \Source\Heranca\Event\OnlineEvent(
    "Workshop FSPHP",
    new \DateTime('2021-06-12'),
    197.90,
    "http://upinside.com.br/aovivo"
);

$onlineEvent->register("Danilo", "danilo.marques@mcom.gov.br");
$onlineEvent->register("Juvenal", "juve.cruz@mcom.gov.br");
$onlineEvent->register("Arlindo", "lindo.antena@mcom.gov.br");
$onlineEvent->register("Carlos", "carlos.chaves@mcom.gov.br");
$onlineEvent->register("Tobias", "tobias.boon@mcom.gov.br");

var_dump($onlineEvent);
