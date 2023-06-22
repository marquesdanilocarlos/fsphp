<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);
$arrA = array(1, 2, 3);
$arrA = [0, 1, 2, 3];

var_dump($arrA);

$arrayIndex = [
    "Brian",
    "Angus",
    "Malcom"
];

$arrayIndex[] = "Cliff";
$arrayIndex[] = "Phil";

var_dump($arrayIndex);

/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);
$assocArray = [
    "vocal" => "Brian",
    "soloGuitar" => "Angus",
    "baseGuitar" => "Malcom",
    "bassGuitar" => "Cliff"
];

$assocArray["drums"] = "Phil";
$assocArray["rockBand"] = "AC/DC";

var_dump($assocArray);

/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);
$brian = ["Brian", "Mic"];
$angus = ["name" => "Angus", "instrument" => "Guitar"];
$band = [$brian, $angus];

var_dump($band);

var_dump([
    "brian" => $brian,
    "angus" => $angus
]);


/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);
$acdc = [
    "name" => "AC/DC",
    "foundationYear" => 1973,
    "vocal" => [
        "name" => "Brian",
        "age" => 63
    ],
    "soloGuitar" => [
        "name" => "Angus",
        "age" => 59
    ],
    "baseGuitar" => [
        "name" => "Malcom",
        "age" => 56
    ],
    "bassGuitar" => [
        "name" => "Cliff",
        "age" => 61
    ],
    "drums" => [
        "name" => "Phil",
        "age" => 65
    ],
];

echo "<h3>O banda {$acdc["name"]} foi fundada em {$acdc["foundationYear"]} e seus integrantes são: </h3>";
echo "<p>Vocalista: {$acdc["vocal"]["name"]} de {$acdc["vocal"]["age"]} anos</p>";
echo "<p>Guitarrista: {$acdc["soloGuitar"]["name"]} de {$acdc["soloGuitar"]["age"]} anos</p>";
echo "<p>Baixista 1: {$acdc["baseGuitar"]["name"]} de {$acdc["baseGuitar"]["age"]} anos</p>";
echo "<p>Baixista 2: {$acdc["bassGuitar"]["name"]} de {$acdc["bassGuitar"]["age"]} anos</p>";
echo "<p>Baterista: {$acdc["drums"]["name"]} de {$acdc["drums"]["age"]} anos</p>";

$pearlJam = [
    "Nome" => "Pearl Jam",
    "Ano de fundação" => 1990,
    "Vocalista" => [
        "name" => "Eddie",
        "age" => 53
    ],
    "Guitarrista" => [
        "name" => "Mike",
        "age" => 50
    ],
    "Baixista 1" => [
        "name" => "Stone",
        "age" => 48
    ],
    "Baixista 2" => [
        "name" => "Jeff",
        "age" => 55
    ],
    "Baterista" => [
        "name" => "Jack",
        "age" => 51
    ],
];

foreach ($pearlJam as $key => $value) {
    $article = "<article>%s</article>";

    if (!is_array($value)) {
        printf($article, "<h2>{$key}: {$value}</h2>");
        continue;
    }

    $template = "<p>{$key}:</p><p>Nome: %s</p><p>Idade: %s</p>";
    $template = vsprintf($template, $value);
    printf($article, $template);
}
