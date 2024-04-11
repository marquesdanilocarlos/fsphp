<?php

namespace Source\Core;

use PDO;
use PDOException;
use PDOStatement;
use \stdClass;

abstract class Model
{
    protected ?stdClass $data;
    protected ?PDOException $fail = null;
    protected ?Message $message;
    protected string $query;
    protected string $params;
    protected string $order;
    protected int $limit;
    protected int $offset;


    public function __construct()
    {
        $this->message = new Message();
    }


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

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function find(?string $terms = null, ?string $params = null, string $columns = '*'): self
    {
        if ($terms) {
            $this->query = "SELECT {$columns} FROM " . static::$entity . " WHERE {$terms}";
            parse_str($params, $this->params);
            return $this;
        }

        $this->query = "SELECT {$columns} FROM " . static::$entity;
        return $this;
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
                parse_str($params, $arrParams);
                foreach ($arrParams as $key => $value) {
                    if ($key === 'limit' || $key === 'offset') {
                        $stmt->bindValue(":{$key}", $value, PDO::PARAM_INT);
                    } else {
                        $stmt->bindValue(":{$key}", $value, PDO::PARAM_STR);
                    }
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
            parse_str($params, $arrParams);

            $stmt = Connection::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");
            $stmt->execute($this->filter(array_merge($data, $arrParams)));

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
            parse_str($params, $arrParams);
            $stmt->execute($arrParams);
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

    protected function required(): bool
    {
        $data = (array)$this->getData();
        foreach (static::$required as $required) {
            if (empty($data[$required])) {
                return false;
            }
        }
        return true;
    }
}