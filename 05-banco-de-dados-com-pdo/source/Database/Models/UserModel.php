<?php


namespace Source\Database\Models;


class UserModel extends Model
{
    private static $entity = "users";

    private static $required = ["id", "created_at", "updated_at"];

    public function bootstrap()
    {
    }

    public function load(int $id, string $columns = "*"): ?self
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");

        if ($this->getFail() || !$load->rowCount()) {
            $this->message = "A consulta não obteve resultados para o id informado.";
            return null;
        }

        return $load->fetchObject(self::class);
    }

    public function find(string $email, string $columns = "*"): ?self
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");

        if ($this->getFail() || !$find->rowCount()) {
            $this->message = "A consulta não obteve resultados para o email informado.";
            return null;
        }

        return $find->fetchObject(self::class);
    }

    public function all(int $limit = 30, int $offset = 0, string $columns = "*")
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if ($this->getFail() || !$all->rowCount()) {
            $this->message = "A consulta não obteve nenhum resultado.";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, self::class);
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
