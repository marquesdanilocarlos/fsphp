<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.03 - Comandos de saída");

/**
 * [ echo ] https://php.net/manual/pt_BR/function.echo.php
 */
fullStackPHPClassSession("echo", __LINE__);

echo "<h3>Olá mundo!", "<span class='tag'>#boraprogramar</span>", "</h3>";

$hello = "Olá mundo!";
$code = "<span class='tag'>#boraprogramar</span>";

echo "<p>$hello $code</p>";

echo '<p>$hello $code</p>';


$day = 'dia';

echo "<p>Falta 1 $day para o evento</p>";
echo "<p>Faltam 2 {$day}s para o evento</p>";

echo "<h3>{$hello}</h3>";
echo "<h4>{$hello} {$code}</h4>";


echo '<h2>' . $hello . " " . $code . '</h2>';

/**
 * [ print ] https://php.net/manual/pt_BR/function.print.php
 */
fullStackPHPClassSession("print", __LINE__);

print $hello;

print "<h3>Oi, $hello {$code}</h3>";


/**
 * [ print_r ] https://php.net/manual/pt_BR/function.print-r.php
 */
fullStackPHPClassSession("print_r", __LINE__);

$array = [
    "company" => "Upinside",
    "course" => "FSPHP",
    "class" => "Comandos de saída"
];

echo "<pre>", print_r($array, true), "</pre>";


/**
 * [ printf ] https://php.net/manual/pt_BR/function.printf.php
 */
fullStackPHPClassSession("printf", __LINE__);

$article = "<article>
    <h1>%s</h1>
    <p>%s</p>
</article>";

$title = "$hello $code";

$text = "As experiências acumuladas demonstram que a adoção de políticas descentralizadoras cumpre um papel essencial na formulação das condições inegavelmente apropriadas.";


//printf printa direto na tela
printf($article, $title, $text);

//sprintf retorna apenas
$finalTemplate = sprintf($article, $title, $text);

echo $finalTemplate;

/**
 * [ vprintf ] https://php.net/manual/pt_BR/function.vprintf.php
 */
fullStackPHPClassSession("vprintf", __LINE__);

$company = "
    <article>
        <h1>
            Escola %s
        </h1>
        <p>
            Curso: <b>%s</b>
            Aula: <b>%s</b>
        </p>
    </article>
";

//Printa direto
//vprintf($company, $array);

//Retorna
$finalTemplate = vsprintf($company, $array);
echo $finalTemplate;

/**
 * [ var_dump ] https://php.net/manual/pt_BR/function.var-dump.php
 */
fullStackPHPClassSession("var_dump", __LINE__);

var_dump($array, $hello, $code);
