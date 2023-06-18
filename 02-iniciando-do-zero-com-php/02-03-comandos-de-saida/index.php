<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);
echo "<p>Hello World", " ", "<span class='tag'>#BoraProgramar!", "</span>";

$hello = "Olá Mundo!";
$code = "<span class='tag'>#BoraProgramar!</span>";

echo "<p>$hello</p>";
echo '<p>$hello</p>';

$day = "dia";
echo "<p>Falta 1 $day para o evento!</p>";
echo "<p>Faltam 2 {$day}s para o evento!</p>";

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";

echo '<h3>' . $hello . ' ' . $code . '</h3>';

?>

<h4><?= $hello; ?> <?= $code; ?></h4>

<?php

/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);
print $hello;
print "<h3>{$hello} {$code}</h3>";

/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);
$array = [
"company" => "Upinside",
"course" => "FSPHP",
"class" => "Comandos de saída"
];

print_r($array);

echo "<pre>", print_r($array, true), "</pre>";

/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf e sprintf", __LINE__);
$article = "<article><h1>%s</h1><p>%s</p></article>";
$title = "{$hello} {$code}";
$subtitle = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta earum eius exercitationem harum ipsam,
 minus modi quaerat sit voluptas voluptates! Commodi dolores eum eveniet impedit maiores molestiae officia rem unde.";

printf($article, $title, $subtitle);

$fullArticle = sprintf($article, $title, $subtitle);
echo $fullArticle;

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);
$company = "<article><h1>Escola: %s</h1><p>Curso: %s</p> <strong>Aula: %s</strong></article>";
vprintf($company, $array);

$fullCompany = vsprintf($company, $array);
echo $fullCompany;


/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);
$int = 10;
$float = 10.5;

var_dump($array, $hello, $int, $float);