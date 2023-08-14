<?php

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connection;

$connection = Connection::getInstance();

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "INSERT INTO users (first_name, last_name, email, document) VALUES ('Danilo', 'Marques', 'marquesdanilocarlos@gmail.com', '764524')";

try {
    //Retorna 1 ou 0, bom para executar comandos manipulação (insert, update, delete)
    $exec = $connection->exec($insert);

    var_dump($connection->lastInsertId());
} catch (PDOException $err) {
    var_dump($err);
}

/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);
try {
    $select = "SELECT * FROM users LIMIT 3";
    $query = $connection->query($select);

    var_dump($query, $query->rowCount(), $query->fetchAll());
} catch (PDOException $err) {
    var_dump($err);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);
try {
    $update = "UPDATE users SET first_name = 'Juvenal', last_name = 'Marques' WHERE id > 50";

    $exec = $connection->exec($update);

    var_dump($exec);

} catch (PDOException $err) {
    var_dump($err);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);
try {

    $delete = "DELETE FROM users WHERE id > 50";
    $exec = $connection->exec($delete);

    var_dump($exec);

} catch (PDOException $err) {
    var_dump($err);
}