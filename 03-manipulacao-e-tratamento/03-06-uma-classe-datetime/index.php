<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);
const DATE_BR = "d/m/Y H:i:s";

$dateNow = new DateTime();
$dateBrith = new DateTime("1991-07-11");
$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2023 12:00:00");

var_dump(
    $dateNow,
    $dateBrith,
    $dateStatic,
    $dateNow->format(DATE_BR),
    $dateNow->format("d")
);

echo "<p>Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de {$dateNow->format("Y")}</p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$dateApia = new DateTime("now", $newTimeZone);

var_dump($dateApia);

/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

/*Obrigatório P - período e T - tempo*/
$dateInterval = new DateInterval("P10Y2MT10M");
$dateNow->add($dateInterval);

var_dump($dateInterval, $dateNow);

var_dump($dateNow->sub($dateInterval));

$birth = new DateTime(date("Y") . "-07-11");
$now = new DateTime("now");

$diff = $dateNow->diff($birth);

if ($diff->invert) {
    echo "Seu aniversário foi há {$diff->days}!";
} else {
    echo "Faltam {$diff->days} para o seu aniversário!";
}

$dateRsources = new DateTime();

var_dump([
    $dateRsources->format(DATE_BR),
    $dateRsources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateRsources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR),
]);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);
$start = new DateTime();
$interval = new DateInterval("P1M");
$end = new DateTime("2024-01-01");

$period = new DatePeriod($start, $interval, $end);

var_dump([
    $start->format(DATE_BR),
    $interval,
    $end->format(DATE_BR)
], $period, get_class_methods($period));

echo "<h1>Sua assinatura:</h1>";
foreach ($period as $recurrence) {
    echo "<p>Proximo vencimento: {$recurrence->format(DATE_BR)}</p>";
}