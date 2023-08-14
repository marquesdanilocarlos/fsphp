<?php

namespace Source\Database;

use \PDO;
use \PDOException;

class Connection
{
    private const HOST = "db";
    private const USER = "root";
    private const DB_NAME = "fsphp";
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

    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException) {
                die("<h1>Ooops, erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }


}