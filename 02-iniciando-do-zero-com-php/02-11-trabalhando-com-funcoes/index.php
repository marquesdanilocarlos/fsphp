<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.11 - Trabalhando com funções");

/*
 * [ functions ] https://php.net/manual/pt_BR/language.functions.php
 */
fullStackPHPClassSession("functions", __LINE__);
require_once __DIR__."/functions.php";

var_dump(rockBands("Pearl Jam", "AC/DC", "Red Hot Chilli Peppers"));
var_dump(rockBands("Kiss", "Scorpions", "Queen"));

var_dump(rockBands("Nirvana"));


/*
 * [ global access ] global $var
 */
fullStackPHPClassSession("global access", __LINE__);
$weight = 60;
$height = 1.70;

var_dump(imc());


/*
 * [ static arguments ] static $var
 */
fullStackPHPClassSession("static arguments", __LINE__);

$pay = totalPay(200);
$pay = totalPay(150);
$pay = totalPay(30);
var_dump($pay);


/*
 * [ dinamic arguments ] get_args | num_args
 */
fullStackPHPClassSession("dinamic arguments", __LINE__);

var_dump(myTeam("Kaue", "Gustavo", "Gah", "João"));
