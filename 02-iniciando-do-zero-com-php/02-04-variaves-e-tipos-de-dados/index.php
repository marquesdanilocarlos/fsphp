<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);
$userFirstName = "Danilo";
$userLastName = "Marques";
echo "<h3>{$userFirstName} {$userLastName}</h3>";

$userAge = 31;
echo "<p>{$userFirstName} {$userLastName} tem <span class='tag'>{$userAge}</span> anos.</p>";

//Variável variável
$company = "Upinside";
$$company = "Treinamentos";

echo "<h3>{$company} {$Upinside}</h3>";

//Valore por Referência
$calcA = 10;
$calcB = 20;
//$calcB = $calcA;
$calcB = &$calcA;
$calcB = 50;

var_dump([
    "A" => $calcA,
    "B" => $calcB
]);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);
$true = true;
$false = false;

var_dump($true, $false);

$bestAge = ($userAge > 50);
var_dump($bestAge);

echo '<hr/>';

$a = 0;
$b = 0.0;
$c = "";
$d = [];
$e = null;

var_dump((bool)$a, (bool)$b, (bool)$c, (bool)$d, (bool)$e);

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article><h1>Um Call User Function</h1></article>";
$codeClear = call_user_func("strip_tags", $code);

$closure = function ($code) {
    return $code;
};

var_dump($code, $codeClear, $closure);

/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);
$string = "Olá Mundo!";
$array = ["valor" => $string];
$object = new \stdClass();
$object->hello = $string;
$null = null;
$int = 10;
$float = 10.5;

var_dump([
    $string,
    $array,
    $object,
    $null,
    $int,
    $float
]);