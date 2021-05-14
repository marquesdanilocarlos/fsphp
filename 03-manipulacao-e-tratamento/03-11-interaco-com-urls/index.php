<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo "<h1><a href='index.php'>Clear</a></h1>";
echo "<p><a href='index.php?arg1=true&arg2=false'>Argumentos</a></p>";

$data = (object)[
    "name" => "Danilo",
    "company" => "SECOM",
    "mail" => "danilo.marques@mcom.gov.br"
];

$arguments = http_build_query($data);

echo "<p><a href='index.php?{$arguments}'>Argumentos by Array</a></p>";

var_dump($data, $_GET, $arguments);

/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

$dataFilter = http_build_query(
    [
        "name" => "Danilo",
        "company" => "SECOM",
        "mail" => "danilo.marquesmcom.gov.br",
        "site" => "secom.gov.br",
        "script" => "<script>alert('Um script!')</script>"
    ]
);

echo "<p><a href='index.php?{$dataFilter}'>Data Filter</a></p>";

$dataPreFilter = [
    "name" => FILTER_SANITIZE_STRIPPED,
    "company" => FILTER_SANITIZE_STRIPPED,
    "mail" => FILTER_VALIDATE_EMAIL,
    "site" => FILTER_VALIDATE_URL,
    "script" => FILTER_SANITIZE_STRIPPED
];

$dataUrl = filter_input_array(INPUT_GET, $dataPreFilter);

if ($dataUrl) {
    if (in_array("", $dataUrl)) {
        echo "<p class='trigger warning'>Faltam dados!</p>";
    } elseif (empty($dataUrl['mail'])) {
        echo "<p class='trigger warning'>Falta o e-mail</p>";
    } elseif (!filter_var($dataUrl['mail'], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>E-mail inválido!</p>";
    } else {
        echo "<p class='trigger accept'>Tudo certo!</p>";
    }
}

var_dump($dataUrl);


$dataFilter = http_build_query(
    [
        "name" => "Danilo",
        "company" => "SECOM",
        "mail" => "danilo.marques@mcom.gov.br",
        "site" => "https://secom.gov.br",
        "script" => "<script>alert('Um script!')</script>"
    ]
);

parse_str($dataFilter, $arrDataFilter);

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));

