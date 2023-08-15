<?php

namespace Source\Model;

use Source\Core\Model;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static array $required = ["first_name", "last_name", "email"];
    protected static string $entity = "users";

    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null)
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;


        return $this;
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

    public function save(): ?self
    {
        if (!empty($this->id)) {
            $userId = $this->id;
            $this->atualize($userId);
        }

        if (empty($this->id)) {
            $userId = $this->insert();
        }

        $this->data = $this->read("SELECT * FROM " . self::$entity . " WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }

    private function atualize(int $userId)
    {
        $email = $this->read(
            "SELECT id FROM " . self::$entity . " WHERE email = :email AND id != :id",
            "email={$this->email}&id={$userId}"
        );

        if ($email->rowCount()) {
            $this->message = "O e-mail informado já está cadastrado.";
            return null;
        }

        $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

        if ($this->getFail()) {
            $this->message = "Erro ao cadastrar, verifique os dados";
            return null;
        }

        $this->message = "Dados atualizados com sucesso!";
    }

    private function insert(): ?int
    {
        if (!$this->required()) {
            return null;
        }

        if ($this->getByEmail($this->email)) {
            $this->message = "O e-mail informado já está cadastrado.";
            return null;
        }

        $userId = $this->create(self::$entity, $this->safe());
        if ($this->getFail()) {
            $this->message = "Erro ao cadastrar, verifique os dados";
            return null;
        }
        $this->message = "Cadastro realizado com sucesso!";

        return $userId;
    }

    public function destroy(): ?self
    {
        if (!empty($this->id)) {
            $this->delete(self::$entity, "id = :id", "id={$this->id}");
        }

        if ($this->getFail()) {
            $this->message = "Não foi possível remover o usuário.";
            return null;
        }

        $this->message = "Usuário removido com sucesso!";
        $this->data = null;
        return $this;
    }

    private
    function required(): bool
    {
        foreach (self::$required as $required) {
            if (empty($this->{$required})) {
                $this->message = "O campo {$required} é obrigatório!";
                return false;
            }
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "O e-mail informado não é válido!";
            return false;
        }

        return true;
    }
}