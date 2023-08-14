<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connection;

$connection = Connection::getInstance();

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);
$stmt = $connection->prepare("SELECT * FROM users WHERE id = 50");
$stmt->execute();

var_dump($stmt, $stmt->rowCount(), $stmt->columnCount(), $stmt->fetchAll());


/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);
$stmt = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES (:firstName, :lastName)");

$stmt->bindValue(":firstName", "Danilo", PDO::PARAM_STR);
$stmt->bindValue(":lastName", "Carlos", PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), $connection->lastInsertId());


/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 * Valores somente por variáveis
 */
fullStackPHPClassSession("stmt bind param", __LINE__);
$stmt = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES (:firstName, :lastName)");

$firstName = "João";
$lastName = "Antena";

$stmt->bindParam(":firstName", $firstName, PDO::PARAM_STR);
$stmt->bindParam(":lastName", $lastName, PDO::PARAM_STR);
$stmt->execute();

var_dump($stmt->rowCount(), $connection->lastInsertId());

/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$stmt = $connection->prepare("INSERT INTO users (first_name, last_name) VALUES (:firstName, :lastName)");

$user = [
    "firstName" => "Carlinha",
    "lastName" => "Lacração"
];

$stmt->execute($user);

var_dump($stmt->rowCount(), $connection->lastInsertId());


/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);
$stmt = $connection->prepare("SELECT * FROM users limit 3");
$stmt->execute();

$stmt->bindColumn("first_name", $firstName);
$stmt->bindColumn("email", $email);

while ($stmt->fetch()) {
    echo "O email de {$firstName} é {$email} <br/>";
}
