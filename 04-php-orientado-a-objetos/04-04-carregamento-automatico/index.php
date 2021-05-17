<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.04 - Carregamento automático");

/*
 * [ autoload spl psr-4 ] Carregamento de suas classes com spl_autoload psr-4
 */
fullStackPHPClassSession("autoload spl psr-4", __LINE__);

/*require __DIR__ . "/source/autoload.php";

use Source\Loading\User;
use Source\Loading\Address;
use Source\Loading\Company;

$user = new User();
$address = new Address();
$company = new Company();

var_dump($user, $company, $address);*/


/*
 * [ autoload composer psr-4 ] https://getcomposer.org/doc/00-intro.md
 */
fullStackPHPClassSession("autoload composer psr-4", __LINE__);

require __DIR__ . "/vendor/autoload.php";

use Source\Loading\User;
use Source\Loading\Address;
use Source\Loading\Company;
use PHPMailer\PHPMailer\PHPMailer;

$user = new User();
$address = new Address();
$company = new Company();

$mailer = new PHPMailer();

var_dump($user, $company, $address, $mailer);
