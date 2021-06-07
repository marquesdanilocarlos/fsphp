<?php


namespace Source\Database;

use \PDO;
use \PDOException;

class Connect
{
    private const HOST = "db";
    private const USER = "root";
    private const DBNAME = "fs_php";
    private const PASSWD = "a654321";
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    private static PDO $instance;

    final private function __construct()
    {

    }

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
                $pdo = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USER, self::PASSWD);

                self::$instance =  $pdo;

            }catch (PDOException $e) {
                die("<h1>Ooops, erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }





}
