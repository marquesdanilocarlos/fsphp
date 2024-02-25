<?php

use PHPMailer\PHPMailer\PHPMailer;
use Source\Core\Email;
use Source\Core\Message;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);
$phpMailer = new PHPMailer();
$message = new Message();

$email = (new Email($phpMailer, $message))->bootstrap(
    'Olá Mundo, esse é meu email!',
    'Email via rotina da aplicação',
    'danilo.marques@basis.com.br',
    'Marques Danilo'
);
$email->attach(__DIR__ . '/../../25231.png', 'GitHub');
$email->attach(__DIR__ . '/../../computer-illustration.png', 'Computer');

if ($email->send()) {
    echo message()->success('Email enviado com sucesso!');
} else {
    echo $email->getMessage();
}