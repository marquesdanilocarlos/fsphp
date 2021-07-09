<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.05 - Uma única interface de erros");

require __DIR__ . "/../source/autoload.php";

/*
 * [ message class ] Uma classe padrão para reportar ao usuário
 */
fullStackPHPClassSession("message class", __LINE__);

$message = new \Source\Core\Message();

var_dump($message, get_class_methods($message));

/*
 * [ message types ] Métodos para cada tipo de mensagem
 */
fullStackPHPClassSession("message types", __LINE__);

/*var_dump(
    $message->getText(),
    $message->getType(),
    $message->render()
);*/


echo $message->success("Mensagem de sucesso!");
echo $message->info("Mensagem de informação!");
echo $message->warning("Mensagem de alerta!");
echo $message->error("Mensagem de erro!");
echo $message->default("Mensagem de default!");


/*
 * [ json message ] Mudando o padrão de retorno
 */
fullStackPHPClassSession("json message", __LINE__);

echo $message->error($message->error("Mensagem renderizada")->json());

/*
 * [ flash message ] Uma mensagem via sessão para refresh de navegação
 */
fullStackPHPClassSession("flash message", __LINE__);

$session = new \Source\Core\Session();

$message->success("Mensagem flash")->flash();

if ($flash = $session->flash()) {
    echo $flash;
}


