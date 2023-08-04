<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.04 - Carregamento automático");

/*
 * [ autoload spl psr-4 ] Carregamento de suas classes com spl_autoload psr-4
 */
fullStackPHPClassSession("autoload spl psr-4", __LINE__);
require __DIR__."/sources/autoload.php";

$user = new \Source\Loading\User();
$company = new \Source\Loading\Company();
$address = new \Source\Loading\Address();

var_dump($company, $user, $address);

/*
 * [ autoload composer psr-4 ] https://getcomposer.org/doc/00-intro.md
 */
fullStackPHPClassSession("autoload composer psr-4", __LINE__);

require __DIR__."/vendor/autoload.php";

$user = new \Source\Loading\User();
$mail = new \PHPMailer\PHPMailer\PHPMailer();

var_dump($user, $mail);

