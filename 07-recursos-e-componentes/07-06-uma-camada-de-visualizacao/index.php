<?php

use League\Plates\Engine;
use Source\Model\User;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.06 - Uma camada de visualização");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ plates ] https://packagist.org/packages/league/plates
 */
fullStackPHPClassSession("plates", __LINE__);

$templates = new Engine(__DIR__ . "/../assets/views", 'php');
$templates->addFolder('test', __DIR__ . "/../assets/views/test");

if (empty($_GET['id'])) {
    echo $templates->render('test::list', [
        'title' => 'Usuários do sistema',
        'list' => (new User())->findAll()
    ]);
} else {
    echo $templates->render('test::user', [
            'title' => '',
            'user' => (new User())->findById($_GET['id'])
        ]
    );
}

/*
 * [ synthesize ] Sintetizando rotina e abstraíndo o recurso (componente)
 */
fullStackPHPClassSession("synthesize", __LINE__);


