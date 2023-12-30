<?php

require __DIR__ . "/../source/autoload.php";
session();
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.12 - Efetuando cadastro de usuário");

/*
 * [ register ] Uma rotina de cadastro blindada contra ataques XSS e CSRF.
 */
fullStackPHPClassSession("register", __LINE__);

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($post) {
    $data = (object)$post;

    if (!csrfVerify($post)) {
        $error = message()->error("Error ao enviar os dados, tente novamente.");
    } else {
        $user = (new \Source\Model\User())->bootstrap(
            $data->first_name,
            $data->first_name,
            $data->email,
            $data->password
        );

        if (!$user->save()) {
            echo $user->getMessage();
        } else {
            echo message()->success("Cadastro realizado com sucesso.");
        }
    }
}

require __DIR__ . "/form.php";