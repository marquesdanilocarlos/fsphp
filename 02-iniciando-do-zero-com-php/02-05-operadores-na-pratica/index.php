<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
echo fullStackPHPClassName("02.05 - Operadores na prática");

/**
 * [ operadores ] https://php.net/manual/pt_BR/language.operators.php
 * [ atribuição ] https://php.net/manual/pt_BR/language.operators.assignment.php
 */
fullStackPHPClassSession("atribuição", __LINE__);

$operadorA = 5;

$operadorA += 5;
$operadorA -= 5;
$operadorA *= 5;
$operadorA /= 5;

var_dump($operadorA);

echo '-------';

$incrementA = 5;
$incrementB = 5;

var_dump($incrementA++, ++$incrementA, $incrementB--, --$incrementB);

/**
 * [ comparação ] https://php.net/manual/pt_BR/language.operators.comparison.php
 */
fullStackPHPClassSession("comparação", __LINE__);

$relatedA = 5;
$relatedB = "5";
$relatedC = 10;

var_dump(
    ($relatedA == $relatedB),
    ($relatedA === $relatedB),
    ($relatedA != $relatedB),
    ($relatedA !== $relatedB),
    ($relatedA > $relatedC),
    ($relatedA < $relatedC),
    ($relatedA >= $relatedB),
    ($relatedA >= $relatedC),
    ($relatedA < $relatedC),
    ($relatedA <= $relatedC),
);

/**
 * [ lógicos ] https://php.net/manual/pt_BR/language.operators.logical.php
 */
fullStackPHPClassSession("lógicos", __LINE__);


$logicA = true;
$logicB = false;

var_dump(
    ($logicA && $logicB),
    ($logicA || $logicB),
    ($logicA),
    (!$logicA),
    (!$logicB),
    (!$logicB),
);

/**
 * [ aritiméticos ] https://php.net/manual/pt_BR/language.operators.arithmetic.php
 */
fullStackPHPClassSession("aritiméticos", __LINE__);

$calcA = 5;
$calcB = 10;

var_dump(
    ($calcA + $calcB),
    ($calcA - $calcB),
    ($calcA * $calcB),
    ($calcA / $calcB),
    ($calcA % $calcB),
);
