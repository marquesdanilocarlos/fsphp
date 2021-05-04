<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.09 - Closures e generators");

/*
 * [ closures ] https://php.net/manual/pt_BR/functions.anonymous.php
 */
fullStackPHPClassSession("closures", __LINE__);

$myAge = function ($year) {
    $age = date("Y") - $year;
    return "Vc tem {$age} anos.";
};

echo $myAge(1991);

$priceBrl = function ($price) {
  return "R$ " . number_format($price, 2, ",", ".");
};

echo "<p>O projeto custa {$priceBrl(3500)}. </p>";


$myCart = [];

$myCart["totalPrice"] = 0;

$cartAdd = function($item, $qtd, $price) use (&$myCart) {
    $myCart[$item] = $qtd * $price;
    $myCart["totalPrice"] += $myCart[$item];
};

$cartAdd("HTML5", 1, 497);
$cartAdd("PHP", 1, 1097);

var_dump($myCart);

/*
 * [ generators ] https://php.net/manual/pt_BR/language.generators.overview.php
 */
fullStackPHPClassSession("generators", __LINE__);

$iterator = 10;

/*$showDates = function($days){
    for ($day = 0; $day <= $days; $day++) {
        $saveDates[] = date("d/m/Y", strtotime("+{$day}days"));
    }

    return $saveDates;
};


foreach ($showDates($iterator) as $date) {
    echo "<div class='tag'>$date</div><br/><br/>";
}*/


$showDatesGenerator = function($days){
    for ($day = 0; $day <= $days; $day++) {
        yield date("d/m/Y", strtotime("+{$day}days"));
    }
};

foreach ($showDatesGenerator($iterator) as $date) {
    echo "<div class='tag'>$date</div><br/><br/>";
}
