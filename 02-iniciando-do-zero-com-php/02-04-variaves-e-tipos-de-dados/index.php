<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

$firstName = "Danilo";
$lastName = "Marques";

echo "<h3>$firstName {$lastName}</h3>";

$age = 29;

echo "<p>$firstName $lastName tem <span class='tag'>{$age}</span></p>";

$company = "UpInside";
$$company = "#boraProgramar";

echo "<h3>$company $UpInside</h3>";

$valorA = 10;
$valorB = 20;

$valorB = &$valorA;
$valorB = 50;

var_dump($valorA, $valorB);


/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;

var_dump($true, $false);

$bestAge = ($age > 50);
var_dump($bestAge);

echo '---------------------';

$a = (bool)0;
$b = (bool)0.0;
$c = (bool)"";
$d = (bool)[];
$e = (bool)null;

var_dump($a, $b, $c, $d, $e);

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$closure = function () {
    return true;
};

var_dump($closure,);


/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "Danilo";
$array = [1,2,3,4,5];
$object = new stdClass();
$null = null;
$int = 50;
$float = 1.2357;

var_dump($string, $array, $object, $null, $int, $float);
