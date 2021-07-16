<?php


namespace Source\Core;

/**
 * Class Model
 * @package Source\Database\Models
 */
abstract class Model
{
    /**
     * @var object|null
     */
    protected ?object $data = null;

    /**
     * @var \PDOException|null
     */
    protected ?\PDOException $fail = null;

    /**
     * @var Message|null
     */
    protected ?Message $message = null;

    public function __construct()
    {
        $this->message = new Message();
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set(string $name, $value)
    {
        if (!$this->data) {
            $this->data = new \stdClass();
        }

        $this->data->{$name} = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->data->{$name} ?? null;
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name): bool
    {
        return isset($this->data->{$name});
    }

    /**
     * @return object|null
     */
    public function getData(): ?object
    {
        return $this->data;
    }

    /**
     * @return \PDOException|null
     */
    public function getFail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message
    {
        return $this->message;
    }

    protected function create(string $entity, array $data): ?int
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = Connect::getInstance()->prepare("INSERT INTO {$entity} ({$columns}) VALUES ({$values})");

            $stmt->execute($this->filter($data));

            return Connect::getInstance()->lastInsertId();
        } catch (\PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function read(string $select, string $params): ?\PDOStatement
    {
        try {
            $stmt = Connect::getInstance()->prepare($select);

            if ($params) {
                parse_str($params, $params);

                foreach ($params as $key => $value) {
                    $type = (is_numeric($value)) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
                    $stmt->bindValue(":{$key}", $value, $type);
                }
            }

            $stmt->execute();

            return $stmt;
        } catch (\PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function update(string $entity, array $data, string $terms, string $params): ?int
    {
        try {
            $dataSet = [];
            foreach ($data as $key => $value) {
                $dataSet[] = "{$key} = :{$key}";
            }
            $dataSet = implode(", ", $dataSet);

            $stmt = Connect::getInstance()->prepare("UPDATE {$entity} SET {$dataSet} WHERE {$terms}");

            parse_str($params, $params);

            $stmt->execute($this->filter(array_merge($params, $data)));

            return $stmt->rowCount() ?? 1;
        } catch (\PDOException $e) {
            $this->fail = $e;
            return null;
        }
    }

    protected function delete(string $entity, string $terms, string $params): ?int
    {
        try {
            $stmt = Connect::getInstance()->prepare("DELETE FROM {$entity} WHERE {$terms}");

            parse_str($params, $params);

            $stmt->execute($params);

            return $stmt->rowCount() ?? 1;
        } catch (\PDOException $e) {
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

    private function filter(array $data): array
    {
        $filter = [];

        foreach ($data as $key => $value) {
            $filter[$key] = (is_null($value)) ? null : filter_var($value, FILTER_SANITIZE_STRIPPED);
        }

        return $filter;
    }

    protected function required(): bool
    {
        $data = (array)$this->getData();
        foreach (static::$requiredFields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }

        return true;
    }
}
