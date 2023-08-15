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

    protected function create(string $entity, array $data): ?int
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $stmt = Connection::getInstance()->prepare(
                "INSERT INTO {$entity} ({$columns}) VALUES ({$values})"
            );
            $stmt->execute($this->filter($data));

            return Connection::getInstance()->lastInsertId();
        } catch (PDOException $e) {
            $this->fail = $e;
            return null;
        }
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

    protected function update(string $entity, array $data, string $terms, string $params): ?int
    {
        try {
            $dataSet = [];

            foreach ($data as $bind => $value) {
                $dataSet[] = "{$bind} = :{$bind}";
            }

            $dataSet = implode(", ", $dataSet);
            parse_str($params, $params);

            $stmt = Connection::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $params)));

            return $stmt->rowCount() ?? 1;
        } catch (PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function delete(string $entity, string $terms, string $params): ?int
    {
        try {
            $stmt = Connection::getInstance()->prepare("DELETE from {$entity} where {$terms}");
            parse_str($params, $params);
            return $stmt->rowCount() ?? 1;
        } catch (PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function safe(): ?array
    {
        $safe = (array)$this->data;
        foreach (static::$safe as $unset) {
            unset($safe[$unset]);
        }

        return $safe;
    }

    private function filter(array $data): ?array
    {
        $filtered = [];
        foreach ($data as $key => $value) {
            $filtered[$key] = $value ? filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS) : null;
        }

        return $filtered;
    }
}