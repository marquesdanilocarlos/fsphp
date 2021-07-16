<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.12 - Efetuando cadastro de usuário");

require __DIR__ . "/../source/autoload.php";

/*
 * [ register ] Uma rotina de cadastro blindada contra ataques XSS e CSRF.
 */
fullStackPHPClassSession("register", __LINE__);



$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRIPPED);

if ($post) {
    $data = (object)$post;

    if (!csrfVerify($post)) {
        $error = message()->error("Erro ao enviar. Favor, tente novamente.");
    } else {
        $user = (new \Source\Models\User())->bootstrap(
            $data->first_name,
            $data->last_name,
            $data->email,
            $data->password
        );
    }

    if (!$user->save()) {
        echo $user->getMessage();
    } else {
        echo message()->success("Cadastro realizado com sucesso!");
    }

    var_dump($user->getData());
}


require __DIR__ . "/form.php";
