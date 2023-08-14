<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
require_once __DIR__ . "/../source/autoload.php";
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);
try {
    throw new Exception("Erro padrão");
    //throw new Error("Erro padrão");
    //throw new PDOException("Erro  de PDO");
} catch (PDOException|Error $pdoError) {
    var_dump($pdoError);
} catch (Exception $exception) {
    var_dump($exception);
}

/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);
try {
    $pdo = new PDO(
        "mysql:host=db;dbname=fsphp",
        "root",
        "a654321",
        [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");

    while ($user = $stmt->fetch()) {
        var_dump($user);
    }
} catch (PDOException $exception) {
    var_dump($exception);
}


/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

use Source\Database\Connection;

$pdo = Connection::getInstance();
$pdo2 = Connection::getInstance();

var_dump($pdo, $pdo2, Connection::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME));

