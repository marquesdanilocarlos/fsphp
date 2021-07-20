<?php


namespace Source\Core;

use \PDO;
use \PDOException;

/**
 * Class Connect
 * @package Source\Core
 */
class Connect
{

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static PDO $instance;

    /**
     * Connect constructor.
     */
    final private function __construct()
    {

    }

    /**
     *
     */
    final private function __clone()
    {

    }

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                $pdo = new PDO("mysql:host=".CONF_DB_HOST.";dbname=".CONF_DB_NAME, CONF_DB_USER, CONF_DB_PASS, self::OPTIONS);

                self::$instance =  $pdo;

            }catch (PDOException $e) {
                die("<h1>Ooops, erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }





}
