<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("05.03 - Errors, conexão e execução");

/*
 * [ controle de erros ] http://php.net/manual/pt_BR/language.exceptions.php
 */
fullStackPHPClassSession("controle de erros", __LINE__);

try {

    throw new ErrorException('Erro maroto de erro!');

    throw new Exception('Erro maroto!');

    throw new PDOException('Erro maroto de banco!');
}
catch (PDOException | ErrorException $e) {
    echo "<p class='trigger warning'>{$e->getMessage()}</p>";
}
catch (Exception $e) {
    echo "<p class='trigger error'>{$e->getMessage()}</p>";
} finally {
    echo "<p class='trigger accept'>Execução terminou!</p>";
}


/*
 * [ php data object ] Uma classe PDO para manipulação de banco de dados.
 * http://php.net/manual/pt_BR/class.pdo.php
 */
fullStackPHPClassSession("php data object", __LINE__);

try {
    $pdo = new PDO("mysql:host=db;dbname=fs_php", "root", "a654321", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    var_dump($pdo);

    $stmt = $pdo->query("SELECT * FROM users LIMIT 3");

    var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));

} catch (PDOException $e) {
    var_dump($e);
}


/*
 * [ conexão com singleton ] Conextar e obter um objeto PDO garantindo instância única.
 * http://br.phptherightway.com/pages/Design-Patterns.html
 */
fullStackPHPClassSession("conexão com singleton", __LINE__);

require __DIR__ . "/../source/autoload.php";

use Source\Database\Connect;

$connect = Connect::getInstance();
$connect2 = Connect::getInstance();

var_dump($connect, $connect2, Connect::getInstance()::getAvailableDrivers(), Connect::getInstance()->getAttribute(PDO::ATTR_DRIVER_NAME));
