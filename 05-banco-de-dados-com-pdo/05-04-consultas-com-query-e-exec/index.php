<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.04 - Consultas com query e exec");

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$pdo = Connect::getInstance();

/*
 * [ insert ] Cadastrar dados.
 * https://mariadb.com/kb/en/library/insert/
 *
 * [ PDO exec ] http://php.net/manual/pt_BR/pdo.exec.php
 * [ PDO query ]http://php.net/manual/pt_BR/pdo.query.php
 */
fullStackPHPClassSession("insert", __LINE__);

$insert = "INSERT INTO users (first_name, last_name, email, document) VALUES ('Robson', 'Leite', 'cursos@upinside.com.br', '2987964')";

try {
    //$exec = $pdo->exec($insert);
    //var_dump($pdo->lastInsertId());


    $query = $pdo->query($insert);

    var_dump($query, $query->errorInfo(), $pdo->lastInsertId());

} catch (PDOException $e) {
    var_dump($e);
}


/*
 * [ select ] Ler/Consultar dados.
 * https://mariadb.com/kb/en/library/select/
 */
fullStackPHPClassSession("select", __LINE__);

try {

    $select = "SELECT * FROM users LIMIT 10";

    $query = $pdo->query($select);

    var_dump($query, $query->fetchAll(), $query->rowCount());
} catch (PDOException $e) {
    var_dump($e);
}

/*
 * [ update ] Atualizar dados.
 * https://mariadb.com/kb/en/library/update/
 */
fullStackPHPClassSession("update", __LINE__);

try {

    $update = "UPDATE users SET first_name = 'Danilo', last_name = 'Marques' WHERE id = 50";

    $exec = $pdo->exec($update);

    var_dump($exec);

} catch (PDOException $e) {
    var_dump($e);
}

/*
 * [ delete ] Deletar dados.
 * https://mariadb.com/kb/en/library/delete/
 */
fullStackPHPClassSession("delete", __LINE__);

try {

    $delete = "DELETE FROM users WHERE id > 50";

    $exec = $pdo->exec($delete);

    var_dump($exec);

} catch (PDOException $e) {
    var_dump($e);
}
