<?php


namespace Source\Models;


use Source\Core\Model;

class User extends Model
{
    private static $entity = "users";

    protected static $safe = ["id", "created_at", "updated_at"];

    protected static $requiredFields = ["first_name", "last_name", "email", "password"];

    public function bootstrap(string $firstName, string $lastName, string $email, string $password, string $document = null): ?self
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->document = $document;

        return $this;
    }


    /**
     * @param string $terms
     * @param string $params
     * @param string $columns
     * @return $this|null
     */
    public function find(string $terms, string $params, string $columns = "*"): ?self
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE {$terms}", $params);

        if ($this->getFail() || !$find->rowCount()) {
            return null;
        }

        return $find->fetchObject(self::class);
    }

    public function findById(int $id, string $columns = "*"): ?self
    {
        return $this->find("id=:id", "id={$id}", $columns);
    }

    public function findByEmail(string $email, string $columns = "*"): ?self
    {
        return $this->find("email=:email", "email={$email}", $columns);
    }

    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :limit OFFSET :offset", "limit={$limit}&offset={$offset}");

        if ($this->getFail() || !$all->rowCount()) {
            return null;
        }

        return $all->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function save(): ?self
    {
        if (!$this->required()) {
            $this->message->warning("Nome, sobrenome, email e senha são obrigatórios.");
            return null;
        }

        if (!isEmail($this->email)) {
            $this->message->warning("O e-mail informado não é valido!");
            return null;
        }

        if (!isPasswd($this->password)) {

            $this->message->warning("A senha deve ter entre " . CONF_PASSWD_MIN_LEN . " e " . CONF_PASSWD_MAX_LEN . " caracteres");
            return null;
        }

        $this->password = passwd($this->password);

        if (!empty($this->id)) {
            $userId = $this->id;

            if ($this->find("email=:email AND id!=:id", "email={$this->email}&id={$userId}")) {
                $this->message->warning("O email informado já está cadastrado");
                return null;
            }

            $this->update(self::$entity, $this->safe(), "id=:id", "id={$userId}");

            if ($this->getFail()) {
                $this->message->error("Erro ao atualizar, verifique os dados.");
                return null;
            }

        }

        if (empty($this->id)) {

            if ($this->findByEmail($this->email)) {
                $this->message->warning("O email informado já está cadastrado.");
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());

            if ($this->getFail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados.");
                return null;
            }

        }

        $this->data = ($this->findById($userId))->getData();

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
}
