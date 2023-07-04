<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=false'>Argumentos</a></p>";

$arrData = [
    "name" => "Danilo",
    "company" => "Basis",
    "email" => "danilo.marques@basis.com.br"
];

//$objData = (object)$arrData;

$urlArguments = http_build_query($arrData);
echo "<p><a href='index.php?{$urlArguments}'>Argumentos por Array</a></p>";

var_dump($_GET);


/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);
$dataFilter = [
    "name" => "Danilo",
    "company" => "Basis",
    "email" => "danilo.marques@basis.com.br",
    "site" => "marquesdanilo.com.br",
    "script" => "<script>alert('Invadido')</script>"
];

$dataUrlParams = http_build_query($dataFilter);
echo "<p><a href='index.php?{$dataUrlParams}'>Data Filter</a></p>";

$dataPreFilter = [
    "name" => FILTER_SANITIZE_SPECIAL_CHARS,
    "company" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_DOMAIN,
    "script" => FILTER_SANITIZE_SPECIAL_CHARS
];

$dataUrl = filter_input_array(INPUT_GET, $dataPreFilter);

if ($dataUrl) {
    if (in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam dados.</p>";
    } elseif (empty($dataUrl["email"])) {
        echo "<p class='trigger warning'>Falta email.</p>";
    } elseif (!filter_var($dataUrl["email"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>Email inválido.</p>";
    } else {
        echo "<p class='trigger accept'>Tudo certo.</p>";
    }
}

var_dump($dataUrl);