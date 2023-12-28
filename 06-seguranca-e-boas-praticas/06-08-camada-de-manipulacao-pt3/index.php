<?php

use Couchbase\ValueRecorder;
use Source\Core\Message;

require __DIR__ . "/../source/autoload.php";

require __DIR__ . '/../../fullstackphp/fsphp.php';


fullStackPHPClassName("06.08 - Camada de manipulação pt3");



/*
 * [ validate helpers ] Funções para sintetizar rotinas de validação
 */
fullStackPHPClassSession("validate", __LINE__);
$message = new Message();

$email = 'cursos@upinside.com.br';

if (!isEmail($email)) {
    echo $message->error('Email inválido!');
} else {
    echo $message->success('Email válido!');
}


$password = '21afsd564a6s5df498as4df3a4sdf694a85sd4f3a21sd3212';

if (!isPassword($password)) {
    echo $message->error('Senha inválida!');
} else {
    echo $message->success('Senha válida!');
}

/*
 * [ navigation helpers ] Funções para sintetizar rotinas de navegação
 */
fullStackPHPClassSession("navigation", __LINE__);

var_dump([
    url('/blog/titulo-artigo'),
    url('blog/titulo-artigo'),
]);

if (empty($_GET)) {
    //redirect('?f=true');
}


/*
 * [ class triggers ] São gatilhos globais para criação de objetos
 */
fullStackPHPClassSession("triggers", __LINE__);

$user = user();

echo message()->warning('Alerta');

session()->set('user', $user->getById(5));

var_dump(session()->all());
