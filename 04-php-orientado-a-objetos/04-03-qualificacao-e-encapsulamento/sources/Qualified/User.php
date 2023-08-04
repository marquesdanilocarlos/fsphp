<?php

namespace Source\Qualified;

class User
{
    private string $firstName = "";
    private string $lastName = "";
    private string $email = "";
    private string $error;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     */
    private function setFirstName(string $firstName)
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    private function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return bool
     */
    private function setEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        $this->email = $email;
        return true;
    }


    public function setUser(string $firstName, string $lastName, string $email): bool
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        if (!$this->setEmail($email)) {
            $this->error = "O e-mail {$email} não é válido.";
            return false;
        };
    }

    public function getError()
    {
        return $this->error;
    }

}