<?php

namespace Source\Model;

use PDO;
use PDOException;
use PDOStatement;
use Source\Database\Connection;
use stdClass;

abstract class Model
{
    protected ?stdClass $data;
    protected ?PDOException $fail = null;
    protected ?string $message;

    public function __set(string $name, $value): void
    {
        if (empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->{$name} = $value;
    }

    public function __get(string $name)
    {
        return $this->data->{$name} ?? null;
    }

    public function __isset(string $name): bool
    {
        return isset($this->data->{$name});
    }


    public function getData(): ?stdClass
    {
        return $this->data;
    }

    public function getFail(): ?PDOException
    {
        return $this->fail;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    protected function create()
    {
    }

    protected function read(string $select, string $params = null): ?PDOStatement
    {
        try {
            $stmt = Connection::getInstance()->prepare($select);

            if ($params) {
                parse_str($params, $params);
                foreach ($params as $key => $value) {
                    $type = is_numeric($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function update()
    {
    }

    protected function delete()
    {
    }

    protected function safe(): ?array
    {
    }

    protected function filter()
    {
    }
}