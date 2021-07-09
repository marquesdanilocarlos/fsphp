<?php


namespace Source\Models;


use Source\Core\Model;

class User extends Model
{
    private static $entity = "users";

    protected static $safe = ["id", "created_at", "updated_at"];

    private static $requiredFields = ["first_name", "last_name", "email"];

    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null): ?self
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->document = $document;

        return $this;
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

    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if ($this->getFail() || !$all->rowCount()) {
            $this->message = "A consulta não obteve nenhum resultado.";
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save(): ?self
    {
        if (!empty($this->id)) {
            $userId = $this->id;

            $email = $this->read("SELECT id, email FROM " . self::$entity . " WHERE email = :email AND id != :id", "email={$this->email}&id={$userId}");

            if ($email->rowCount()) {
                $this->message = "O email informado já está cadastrado";
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id = :id", "id={$userId}");

            if ($this->getFail()) {
                $this->message = "Erro ao atualizar, verifique os dados.";
                return null;
            }

            $this->message = "Dados atualizados com sucesso!";
        }

        if (empty($this->id)) {

            if (!$this->required()) {
                return null;
            }

            if ($this->find($this->email)) {
                $this->message = "O email informado já está cadastrado.";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());

            if ($this->getFail()) {
                $this->message = "Erro ao cadastrar, verifique os dados.";
                return null;
            }

            $this->message = "Cadastro realizado com sucesso!";
        }

        $this->data = $this->read("SELECT * FROM " . self::$entity . " WHERE id = :id", "id={$userId}")->fetch();

        return $this;
    }

    public function destroy()
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

    private function required(): bool
    {
        foreach (self::$requiredFields as $requiredField) {
            if (empty($this->{$requiredField})) {
                $this->message = "O campo $requiredField é obrigatório.";
                return false;
            }
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->message = "O email informado não parece válido.";
            return false;
        }

        return true;
    }
}
