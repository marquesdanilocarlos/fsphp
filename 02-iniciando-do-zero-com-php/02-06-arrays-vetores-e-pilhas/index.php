<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrayA = [1,2,3];

var_dump($arrayA);

$indexedArray = [
    "Brian",
    "Angus",
    "Malcom"
];

$indexedArray[] = "Cliff";
$indexedArray[] = "Phill";

var_dump($indexedArray);


/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$assocArray = [
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff"
];

$assocArray['drumps'] = "Phill";
$assocArray['rock_band'] = "AC/DC";

var_dump($assocArray);

/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

$brian = ["Brian", "Mic"];
$angus = ["name" => "Angus", "instrument" => "Guitar"];

var_dump([$brian, $angus]);


/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [
    "band" => "AC/DC",
    "vocal" => "Brian",
    "solo_guitar" => "Angus",
    "base_guitar" => "Malcolm",
    "bass_guitar" => "Cliff",
    "drums" => "Phill"
];


echo "<p>O vocalista da banda AC/DC é {$acdc['vocal']}, e junto com {$acdc['solo_guitar']} fazem um ótimo show</p>";

$pearl = [
    "band" => "Pearl Jam",
    "vocal" => "Eddie",
    "solo_guitar" => "Mike",
    "base_guitar" => "Stone",
    "bass_guitar" => "Jeff",
    "drums" => "Jack"
];

$rockBands = [
    "acdc" => $acdc,
    "pear_jam" => $pearl
];


var_dump($rockBands);

echo "<p>{$rockBands["pear_jam"]["vocal"]}</p>";

foreach ($rockBands as $rockBand) {
    $article = "
        <article>
            <h3>%s</h3>
            <p>%s</p>
            <p>%s</p>
            <p>%s</p>
            <p>%s</p>
            <p>%s</p>
        </article>
    ";
    vprintf($article, $rockBand);
}
