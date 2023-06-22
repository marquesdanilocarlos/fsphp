<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);
$myAge = function (int $year) {
    $age = date("Y") - $year;
    return "<p>Você tem {$age} anos!</p>";
};

echo $myAge(1991);
echo $myAge(1986);
echo $myAge(1995);
echo $myAge(2001);

$priceBrl = function (float $price): string {
    return number_format($price, 2, ",", ".");
};

echo "<p>O projeto custa {$priceBrl(3560.99)}. Vamos fechar?</p>";


$myCart = [
    "totalPrice" => 0
];
$cartAdd = function (string $item, int $qtd, float $price) use (&$myCart) {
    $myCart[$item] = $qtd * $price;
    $myCart["totalPrice"] += $myCart[$item];
};


$cartAdd("HTML5", 1, 497);
$cartAdd("JQuery", 1, 599);
$cartAdd("PHP", 1, 1097);
$cartAdd("CSS", 1, 399);

var_dump($myCart);
var_dump($cartAdd);


/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

function showDates(int $days): array
{
    $saveDate = [];

    for ($day = 1; $day < $days; $day++) {
        $saveDate[] = date("d/m/Y", strtotime("+{$day} days"));
    }

    return $saveDate;
}

echo "<div style='text-align: center'>";
foreach (showDates(0) as $date) {
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";


function generatorDate(int $days): Generator
{
    for ($day = 1; $day < $days; $day++) {
        yield date("d/m/Y", strtotime("+{$day} days"));
    }
}

echo "<div style='text-align: center'>";
foreach (generatorDate(10000) as $date) {
    echo "<small class='tag'>{$date}</small>" . PHP_EOL;
}
echo "</div>";