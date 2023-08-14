<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.05 - Explorando estilos de busca");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connection;

$connection = Connection::getInstance();


/*
 * [ fetch ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch", __LINE__);
$query = $connection->query("SELECT * FROM users LIMIT 3");

if (!$query->rowCount()) {
    echo "<p class='trigger warning'>Não obteve resultados.</p>";
    exit;
}

while ($user = $query->fetch()) {
    var_dump($user);
}


/*
 * [ fetch all ] http://php.net/manual/pt_BR/pdostatement.fetchall.php
 */
fullStackPHPClassSession("fetch all", __LINE__);

$query = $connection->query("SELECT * FROM users LIMIT 3,2");
$users = $query->fetchAll();

foreach ($users as $user) {
    var_dump($user);
}


/*
 * [ fetch save ] Realziar um fetch diretamente em um PDOStatement resulta em um clear no buffer da consulta. Você
 * pode armazenar esse resultado em uma variável para manipilar e exibir posteriormente.
 */
fullStackPHPClassSession("fetch save", __LINE__);
$query = $connection->query("SELECT * FROM users LIMIT 5,1");
$result = $query->fetchAll();

var_dump($result, $query->fetchAll());


/*
 * [ fetch modes ] http://php.net/manual/pt_BR/pdostatement.fetch.php
 */
fullStackPHPClassSession("fetch styles", __LINE__);

$query = $connection->query("SELECT * FROM users LIMIT 1");
foreach ($query->fetchAll(PDO::FETCH_OBJ) as $user) {
    var_dump($user);
}

$query = $connection->query("SELECT * FROM users LIMIT 1");
foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $user) {
    var_dump($user);
}

$query = $connection->query("SELECT * FROM users LIMIT 1");
foreach ($query->fetchAll(PDO::FETCH_BOTH) as $user) {
    var_dump($user);
}

$query = $connection->query("SELECT * FROM users LIMIT 1");
/**
 * @var $user Source\Database\Entity\User
 */
foreach ($query->fetchAll(PDO::FETCH_CLASS, \Source\Database\Entity\User::class) as $user) {
    var_dump($user->getFirstName(), $user->getLastName(), $user->getEmail());
}
