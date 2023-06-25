<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$indexed = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge"
];

$assoc = [
    "band1" => "AC/DC",
    "band2" => "Nirvana",
    "band3" => "Alter Bridge"
];

//Adicionar valores no início do array
array_unshift($indexed, "", "Pearl Jam");
$assoc = ["band4" => "", "band5" => "Pearl Jam"] + $assoc;

//Adicionar valores no final do array
array_push($indexed, "Black Sabbath");
$assoc += ["band6" => "Black Sabbath"];

//Remover o primeiro elemento do array
array_shift($indexed);
array_shift($assoc);

//Remover o último elemento do array
array_pop($indexed);
array_pop($assoc);


array_unshift($indexed, "");
array_unshift($assoc, "");

//Filtrar elementos vazios ou de acordo com uma closure de um array
$indexed = array_filter($indexed);
$assoc = array_filter($assoc);

var_dump($indexed, $assoc);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

//Inverter valores de um array
$indexed = array_reverse($indexed);
$assoc = array_reverse($assoc);

var_dump(
    $indexed,
    $assoc
);

//Ordenar array pelo valor, sem reindexar
asort($indexed);
asort($assoc);

//Odernar valores de um array pela chave
ksort($indexed);
krsort($indexed);

//Ordenar array pelo valor, reindexando
sort($indexed);
rsort($indexed);

var_dump(
    $indexed,
    $assoc
);

/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    array_keys($assoc),
    array_values($assoc)
]);

//Verificar a existência de um valor dentro de um array
if (in_array("AC/DC", $assoc)) {
    echo "<p>AC/DC existe!</p>";
}

//Transformar os valores de um array em uma string
$arrToString = implode(", ", $assoc);
echo "<p>Eu curto {$arrToString} e muitas outras!</p>";

//Transformar uma string em um array
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
                    <p><a href="mailto:{{mail}}" title="Enviar email para {{name}}">Enviar email</a></p>
                </article>
            TPL;

echo $template;

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";
$replaces = explode("&", $replaces);

echo str_replace($replaces, array_values($profile), $template);

