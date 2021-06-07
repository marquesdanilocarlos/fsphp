<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$pdo = Connect::getInstance();

/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);

$read = $pdo->query("SELECT * FROM users LIMIT 3");

if (!$read->rowCount()) {
    echo "<p class='trigger warning'>Nenhum resultado</p>";
} else {
    var_dump($read->fetch());

    while ($user = $read->fetch()) {
        var_dump($user);
    }

    var_dump($read->fetch());
}

/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$read = $pdo->query("SELECT * FROM users LIMIT 5,3");

$users = $read->fetchAll();

var_dump($users);

foreach ($users as $user) {
    var_dump($user);
}


/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);

$read = $pdo->query("SELECT * FROM users LIMIT 5,1");

$result = $read->fetchAll();

var_dump($read->fetchAll(), $result);


/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$read = $pdo->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_OBJ) as $item) {
    var_dump($item);
}

$read = $pdo->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_NUM) as $item) {
    var_dump($item);
}

$read = $pdo->query("SELECT * FROM users LIMIT 1");
foreach ($read->fetchAll(PDO::FETCH_ASSOC) as $item) {
    var_dump($item);
}

$read = $pdo->query("SELECT * FROM users LIMIT 1");
/**
 * @var \Source\Database\Entity\UserEntity $item
 */
foreach ($read->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\UserEntity::class) as $item) {
    var_dump($item, $item->getFirstName());
}
