<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

$form = new stdClass();
$form->name = "Danilo";
$form->mail = "marquesdanilocarlos@gmail.com";
$form->method = "GET";
$form->method = "POST";

//var_dump($_REQUEST);

//include __DIR__ . "/form.php";



/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

/*$form->method = "POST";

var_dump($_POST);

$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

var_dump($post, $postArray);

if ($postArray) {
    if (in_array("", $postArray)) {
        echo "<p class='trigger warning'>Preencha todos os campos!</p>";
    } elseif (!filter_var($postArray["mail"], FILTER_VALIDATE_EMAIL)) {
        echo "<p class='trigger warning'>Email informado não é valido!</p>";
    } else {
        $save = array_map("strip_tags", $postArray);
        $save = array_map("trim", $save);

        var_dump($save);

        echo "<p class='trigger success'>Cadastro com sucesso!</p>";
    }
}

include __DIR__ . "/form.php"; */

/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

$form->method = "GET";

$get = filter_input(INPUT_GET, "mail", FILTER_VALIDATE_EMAIL);
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

include __DIR__ . "/form.php";

var_dump($get,$getArray);


/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);

var_dump(filter_list(), [filter_id("validate_email"), FILTER_VALIDATE_EMAIL, filter_id("string")]);

$filterForm = [
    "name" => FILTER_SANITIZE_STRIPPED,
    "mail" => FILTER_VALIDATE_EMAIL
];

$getForm = filter_input_array(INPUT_GET, $filterForm);

var_dump($getForm, filter_var($getForm["mail"], FILTER_VALIDATE_EMAIL), filter_var_array($getForm, $filterForm));
