<?php

use Source\Core\Route;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.12 - Desmistificando rotas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ routes ]
 */
fullStackPHPClassSession("routes", __LINE__);

Route::get('/', 'UserController:home');
Route::get('/editar', 'UserController:edit');

Route::get('/rotas', function () {
    echo ('Entrou na rota de closure');
});