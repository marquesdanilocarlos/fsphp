<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");


/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);
$form = new stdClass();
$form->name = "";
$form->mail = "";
$form->method = "POST";

var_dump($_REQUEST);

require __DIR__ . "/form.php";


/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

//$postName = filter_input(INPUT_POST, "name");
$postArray = filter_input_array(INPUT_POST);

var_dump($postArray);

if ($postArray) {
    if (in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos.</p>";
    } elseif (!filter_var($postArray["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>O email informado não é válido.</p>";
    } else {
        $save = array_map("strip_tags", $postArray);
        $save = array_map("trim", $save);
        var_dump($save);
        echo "<p class='trigger accept'>Cadastro com sucesso!</p>";
    }
}

require __DIR__ . "/form.php";


/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

$form->method = "GET";
require __DIR__ . "/form.php";

$getName = filter_input(INPUT_GET, "name");
$getArray = filter_input_array(INPUT_GET);

var_dump($getArray);


/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);
var_dump(filter_list(), filter_id("string"));


$formFilters = [
    "name" => FILTER_SANITIZE_SPECIAL_CHARS,
    "email" => FILTER_VALIDATE_EMAIL
];

$getForm = filter_input_array(INPUT_GET, $formFilters);

var_dump($getForm);

$name = "Danilera! <script>alert('Invasão')</script>";
$email = "danilo.marques@.com.br";

var_dump(filter_var($email, FILTER_VALIDATE_EMAIL), filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS));