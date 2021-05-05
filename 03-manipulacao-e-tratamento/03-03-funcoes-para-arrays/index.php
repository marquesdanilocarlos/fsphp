<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge"
];

$assoc = [
    "band_1" => "AC/DC",
    "band_2" => "Nirvana",
    "band_3" => "Alter Bridge"
];

array_unshift($index, "Pearl Jam", "" );
$assoc = ["band_4" => "Pearl Jam", "band_5" => ""] + $assoc;

array_push($index, "Scorpions");
$assoc = $assoc + ["band_6" => "Scorpions"];

array_shift($index);
array_shift($assoc);

array_pop($index);
array_pop($assoc);

$index = array_filter($index);
$assoc = array_filter($assoc);

var_dump($index, $assoc);


/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index);
$assoc = array_reverse($assoc);

asort($index);
asort($assoc);

ksort($index);
ksort($assoc);

krsort($index);
krsort($assoc);

sort($index);
rsort($assoc);

var_dump($index, $assoc);


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
             array_keys($assoc),
             array_values($assoc)
         ]);

if (in_array("AC/DC", $assoc)) {
    echo "<p>Cause I'm Back!</p>";
}

$arrToString = implode(", ", $assoc);

echo "<p>Eu curto {$arrToString} e muitas outras</p>";

var_dump(explode(", ", $arrToString));


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Robson",
    "company" => "Upinside",
    "mail" => "cursos@upinside.com.br"
];

$template = <<<TPL
    <article>
    <h1>{{name}}</h1>
    <p>{{company}}</p>
    <p><a href="mailto:{{mail}}">Enviar e-mail</a></p>
</article>
TPL;

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";
echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);
