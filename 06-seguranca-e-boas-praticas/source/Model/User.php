<?php

namespace Source\Model;

use Source\Core\Model;

class User extends Model
{
    protected static array $safe = ["id", "created_at", "updated_at"];
    protected static array $required = ["first_name", "last_name", "email", "password"];
    protected static string $entity = "users";

    public function bootstrap(
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        string $document = null
    ) {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;

        return $this;
    }

    public function find(string $terms, string $params, string $columns = '*'): ?User
    {
        $data = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}",
            $params
        );

        if ($this->getFail() || !$data->rowCount()) {
            return null;
        }

        return $data->fetchObject(self::class);
    }

    public function findById(int $id, string $columns = "*"): ?self
    {
        return $this->find("id=:id", "id={$id}", $columns);
    }

    public function findByEmail(string $email, string $columns = "*"): ?self
    {
        return $this->find("email=:email", "email={$email}", $columns);
    }

    public function findAll(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $data = $this->read(
            "SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset",
            "limit={$limit}&offset={$offset}"
        );

        if ($this->getFail() || !$data->rowCount()) {
            return null;
        }

        return $data->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save(): ?self
    {
        if (!empty($this->id)) {
            $userId = $this->atualize($this->id);
        }

        if (empty($this->id)) {
            $userId = $this->insert();
        }

        if (!$userId) {
            return null;
        }

        $this->data = ($this->findById($userId))->getData();
        return $this;
    }

    private function atualize(int $userId): ?int
    {
        $email = $this->find("email = :email AND id != :id", "email={$this->email}&id={$userId}");


        if ($email) {
            $this->message->warning("O e-mail informado já está cadastrado.");
            return null;
        }

        $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

        if ($this->getFail()) {
            $this->message->error("Erro ao cadastrar, verifique os dados");
            return null;
        }

        $this->message->success("Dados atualizados com sucesso!");
        return $userId;
    }

    private function insert(): ?int
    {
        if (!$this->required() || !$this->validateEmail()) {
            $this->message->warning('Nome, sobrenome, email e senha são obrigatórios');
            return null;
        }

        if ($this->findByEmail($this->email)) {
            $this->message->warning("O e-mail informado já está cadastrado.");
            return null;
        }

        $userId = $this->create(self::$entity, $this->safe());
        if ($this->getFail()) {
            $this->message->error("Erro ao cadastrar, verifique os dados");
            return null;
        }
        $this->message->success("Cadastro realizado com sucesso!");

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

    private function validateEmail(): bool
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = message()->warning("O e-mail informado não é válido!");
            return false;
        }

        return true;
    }
}