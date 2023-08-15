<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.10 - Model bootstrap e cadastro");

require __DIR__ . "/../source/autoload.php";

/*
 * [ bootstrap ] Inicialização de dados
 */
fullStackPHPClassSession("bootstrap", __LINE__);
$user = (new \Source\Model\User())->bootstrap("Danilo<script>",
    "Marques",
    "marquesdanilocarlos@live.com",
    );



var_dump($user);


/*
 * [ save create ] Salvar o usuário ativo (Active Record)
 */
fullStackPHPClassSession("save create", __LINE__);

if (!$user->getByEmail($user->email)) {
    echo "<p class='trigger warning'>Cadastro</p>";
    $user->save();
} else {
    echo "<p class='trigger warning'>Leitura</p>";
    $user = $user->getByEmail($user->email);
}

var_dump($user->getData());



