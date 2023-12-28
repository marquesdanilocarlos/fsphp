<?php

use Source\Core\Message;
use Source\Core\Session;

require __DIR__ . "/../source/autoload.php";

$session = new Session();

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);
$message = new Message();
var_dump($message, get_class_methods($message));

/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

var_dump([
    $message->getText(),
    $message->getType(),
    $message->render()
]);

echo $message->success('Mensagem de sucesso!');
echo $message->error('Mensagem de erro!');
echo $message->warning('Mensagem de alerta!');
echo $message->info('Mensagem de informação!');

/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);
echo $message->warning('Mensagem de alerta!')->json();
echo $message->info('Mensagem de informação!')->json();

/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);

//$message->success('Mensagem flash')->flash();

if ($flash = $session->flash()) {
    echo $flash;
    var_dump($flash->getType(), $flash->getText());
}

var_dump($_SESSION, $session->all());

