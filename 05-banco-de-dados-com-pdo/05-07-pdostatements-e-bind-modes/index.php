<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.07 - PDOStatement e bind modes");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$pdo = Connect::getInstance();

/**
 * [ prepare ] http://php.net/manual/pt_BR/pdo.prepare.php
 */
fullStackPHPClassSession("prepared statement", __LINE__);

$search = filter_input(INPUT_GET, "f");

$stmt = $pdo->prepare("SELECT * FROM users LIMIT 1");

$stmt->execute();


var_dump($stmt, $stmt->rowCount(), $stmt->columnCount(), $stmt->fetchAll());

/*
 * [ bind value ] http://php.net/manual/pt_BR/pdostatement.bindvalue.php
 *
 */
fullStackPHPClassSession("stmt bind value", __LINE__);

$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)");

$stmt->bindValue("first_name", 'Arlindo', PDO::PARAM_STR);
$stmt->bindValue("last_name", 'Antena', PDO::PARAM_STR);

$stmt->execute();

var_dump($stmt->rowCount(), $pdo->lastInsertId());

/*
 * [ bind param ] http://php.net/manual/pt_BR/pdostatement.bindparam.php
 */
fullStackPHPClassSession("stmt bind param", __LINE__);

$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)");

$firstName = "Juvenal";
$lastName = "Cruz";

$stmt->bindParam("first_name", $firstName, PDO::PARAM_STR);
$stmt->bindParam("last_name", $lastName, PDO::PARAM_STR);

$stmt->execute();

var_dump($stmt->rowCount(), $pdo->lastInsertId());


/*
 * [ execute ] http://php.net/manual/pt_BR/pdostatement.execute.php
 */
fullStackPHPClassSession("stmt execute array", __LINE__);

$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:first_name, :last_name)");

$user = [
    "first_name" => "Shaolin",
    "last_name" => "Matador de porco"
];

$stmt->execute($user);

var_dump($stmt->rowCount(), $pdo->lastInsertId());

/*
 * [ bind column ] http://php.net/manual/en/pdostatement.bindcolumn.php
 */
fullStackPHPClassSession("bind column", __LINE__);

$stmt = $pdo->prepare("SELECT * FROM users LIMIT 3");

$stmt->execute();

$stmt->bindColumn("first_name", $name);
$stmt->bindColumn("email", $email);

while ($user = $stmt->fetch()) {
    var_dump($user);
    echo "O e-mail de {$name} é {$email}";
}
