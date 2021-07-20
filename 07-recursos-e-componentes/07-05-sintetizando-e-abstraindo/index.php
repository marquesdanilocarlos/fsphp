<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.05 - Sintetizando e abstraindo");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ synthesize ]
 */
fullStackPHPClassSession("synthesize", __LINE__);

$email = (new \Source\Core\Mail())->bootstrap(
    "Olá mundo esse é meu e-mail",
    "<h1>Uma mensagem via rotina da aplicação</h1>",
    "danilo.marques@mcom.gov.br",
    "Danilo Marques"
);

$email->attach(__DIR__ . "/mcom.jpeg", "MCOM");
$email->attach(__DIR__ . "/mcom2.png", "MCOM 2");

if ($email->send()) {
    echo message()->success("Email enviado com sucesso");
} else {
    echo $email->getMessage();
}
