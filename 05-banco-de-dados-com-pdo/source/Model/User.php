<?php

namespace Source\Model;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static string $entity = "users";

    public function bootstrap()
    {
        
    }

    public function getById(int $id, string $columns = "*"): ?self
    {
        $data = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE id = :id",
            "id={$id}"
        );

        if ($this->getFail() || !$data->rowCount()) {
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }

        return $data->fetchObject(self::class);
    }

    public function getByEmail(string $email, string $columns = "*"): ?self
    {
        $data = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE email = :email",
            "email={$email}"
        );

        if ($this->getFail() || !$data->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }

        return $data->fetchObject(self::class);
    }

    public function getAll(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $data = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset",
            "limit={$limit}&offset={$offset}"
        );

        if ($this->getFail() || !$data->rowCount()) {
            $this->message = "Sua consulta não retornou nenhum resultado";
            return null;
        }

        return $data->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save()
    {
        
    }

    public function destroy()
    {
        
    }

    private function required()
    {
        
    }
}