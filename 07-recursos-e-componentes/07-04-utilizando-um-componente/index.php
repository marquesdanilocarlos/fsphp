<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

$phpMailer = new PHPMailer();

var_dump($phpMailer);



/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {

    $mail = new PHPMailer(true);

    //Config
    $mail->isSMTP();
    $mail->setLanguage("br");
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->CharSet = 'utf-8';

    //Auth
    $mail->Host = "smtp.sendgrid.net";
    $mail->Username = "apikey";
    $mail->Password = "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";
    $mail->Port = "587";

    //Email
    $mail->setFrom("marquesdanilocarlos@gmail.com", "Danilo Marques");
    $mail->Subject = "Email via componente";
    $mail->msgHTML("<h1>Meu primeiro disparo de e-mail.</h1>");

    //Send
    $mail->addAddress("marquesdanilocarlos@gmail.com", "Danilo");

    $send = $mail->send();

    var_dump($send);

} catch (PHPMailerException $exception) {
    echo message()->error($exception->getMessage());
}
