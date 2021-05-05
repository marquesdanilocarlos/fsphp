<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);


define("DATE_BR", "d/m/Y H:i:s");
//define("DATE_TIMEZONE", "Pacific/Apia");
define("DATE_TIMEZONE", "America/Sao_Paulo");
date_default_timezone_set(DATE_TIMEZONE);

var_dump([
             date_default_timezone_get(),
             date(DATE_W3C),
             date(DATE_BR)
         ]);

var_dump(getdate());

$teste = 0;

echo "<p>Hoje é dia ", getdate()['mday'],"!</p>";

/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);

var_dump([
    "strtotime NOW" => strtotime("now"),
"time" => time(),
    "+ 10d" => strtotime("+10days"),
    "date BR" => date(DATE_BR),
    "date BR +10d" => date(DATE_BR, strtotime("+10days")),
    "date BR -10d" => date(DATE_BR, strtotime("-10days")),
    "date BR +1y" => date(DATE_BR, strtotime("+1years")),
         ]);


$format = "%d/%m/%Y %Hh%M";

echo "<p>A data de hoje é ", strftime($format), "<p>";

echo strftime("<p>Hoje é dia %d do mês %m de %Y às %H horas e %M minutos.</p>");
