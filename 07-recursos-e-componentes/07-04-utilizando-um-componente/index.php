<?php

use PHPMailer\PHPMailer\Exception as MailException;
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.04 - Utilizando um componente");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ instance ] https://packagist.org/packages/phpmailer/phpmailer
 */
fullStackPHPClassSession("instance", __LINE__);

$mail = new PHPMailer();
var_dump($mail);

/*
 * [ configure ]
 */
fullStackPHPClassSession("configure", __LINE__);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = '172.17.0.1';                     //Set the SMTP server to send through
    $mail->SMTPAuth = false;                                   //Enable SMTP authentication
    $mail->Port = 2025;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('marquesdanilocarlos@gmail.com', 'Danilo');
    $mail->addAddress('danilo.marques@basisti.com.br', 'Danilo Marues');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email com PHPMailer';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (MailException $e) {
    echo message()->error($e->getMessage());
}