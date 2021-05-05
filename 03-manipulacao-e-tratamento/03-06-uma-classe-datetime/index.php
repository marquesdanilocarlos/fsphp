<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

define("DATE_BR", "d/m/Y H:i:s");

$dateNow = new DateTime();
$dateBirth = new DateTime("1991-07-11");

$dateStatic = DateTime::createFromFormat(DATE_BR, "10/03/2020 12:00:00");

var_dump($dateNow, $dateBirth, $dateStatic, $dateNow->format(DATE_BR), $dateNow->format("d"));

echo "<p>Hoje é dia {$dateNow->format("d")} do mês {$dateNow->format("m")} do ano {$dateNow->format('Y')}</p>";

$newTimeZone = new DateTimeZone("Pacific/Apia");
$newDate = new DateTime('now', $newTimeZone);

var_dump($newDate);


/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

$interval = new DateInterval("P10Y2MT10M");

$data = new DateTime();
$data->add($interval);
$data->sub($interval);

var_dump($data);


$birth = new DateTime(date("Y") . "-07-11");
$dateNow = new DateTime();

$diff = $dateNow->diff($birth);

var_dump($diff);

if ($diff->invert) {
    echo "<p>Seu aniversário foi há {$diff->days} dias.</p>";
} else {
    echo "<p>Faltam {$diff->days} dias para o seu aniversário.</p>";
}

$dateResources = new DateTime();

var_dump([
    $dateResources->format(DATE_BR),
    $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR),
    $dateResources->add(DateInterval::createFromDateString("10days"))->format(DATE_BR)
         ]);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

$start = new DateTime();
$interval = new DateInterval("P1M");
$end = new DateTime('2022-01-06');

$period = new DatePeriod($start, $interval, $end);

var_dump($start->format(DATE_BR), $interval, $end->format(DATE_BR), $period);

echo "<h1>Vencimentos:</h1>";

/**
 * @var $recurrence DateTime
 */
foreach ($period as $recurrence) {
    echo $recurrence->format(DATE_BR) . "<br/>";
}
