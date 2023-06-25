<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);

$string = "O último show do AC/DC foi incrível!";

var_dump([
    'string' => $string,
    //Tamanho da string
    "strlen" => strlen($string),
    //Tamanho da string em multi-byte
    "mb_strlen" => mb_strlen($string),
    //Obter parte da string
    "substr" => substr($string, "9"),
    //Obter parte da string em multi-byte
    "mb_substr" => mb_substr($string, "9"),
    //Converter string para caixa alta
    "strtoupper" => strtoupper($string),
    //Converter string para caixa alta com multi-byte
    "mb_strtoupper" => mb_strtoupper($string),
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);
$mbString = $string;

var_dump([
    //Converter string para caixa alta com multi-byte
    "mb_strtoupper" => mb_strtoupper($mbString),
    //Converter string para caixa baixa com multi-byte
    "mb_strtolower" => mb_strtolower($mbString),
    //Converter string para diversos formatos (de acordo com a constante), com multi-byte
    "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER),
    "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER),
    "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE),
]);


/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);
$mbReplace = "{$mbString}. Fui, iria novamente, e foi épico.";

var_dump([
    "mb_strlen" => mb_strlen($mbReplace),
    //Obter o índice numérico da posição do caractere dentro da string
    "mb_strpos" => mb_strpos($mbReplace, ", "),
    //Obter o índice numérico da posição da última ocorrência do caractere dentro da string
    "mb_strrpos" => mb_strrpos($mbReplace, ", "),
    //Obter uma parte da string
    "mb_sbstr" => mb_substr($mbReplace, 43, 14),
    //Obter uma parte da string a partir do caracter passado como parâmetro
    "mb_strstr" => mb_strstr($mbReplace, ", "),
    //Obter uma parte da string a partir da última ocorrência do caracter passado como parâmetro
    "mb_strrchr" => mb_strrchr($mbReplace, ", ")
]);

$mbReplace = $string;

echo "<p>{$string}</p>";

//Substituir uma parte da string, que foi passada no primeiro parâmetro, pela string passada no segundo parâmetro
echo "<p>", str_replace("AC/DC", "Nirvana", $mbReplace), "</p>";
echo "<p>", str_replace(["AC/DC", "último"], "Nirvana", $mbReplace), "</p>";
echo "<p>", str_replace(["AC/DC", "incrível"], ["Nirvana", "Épicooo!"], $mbReplace), "</p>";

$article = <<<ROCK
    <article>
        <h3>event</h3>
        <p>desc</p>
    </article>
ROCK;

$articleData = [
    "event" => "Rock in Rio",
    "desc" => $mbReplace
];

echo str_replace(array_keys($articleData), array_values($articleData), $article);

/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

//Converter query string em valores indexados (array, object)
$endPoint = "name=Danilo&email=danilo.marques@mcom.gov.br";
mb_parse_str($endPoint, $parsedEndPoint);

var_dump([
    $endPoint,
    $parsedEndPoint,
    (object)$parsedEndPoint
]);