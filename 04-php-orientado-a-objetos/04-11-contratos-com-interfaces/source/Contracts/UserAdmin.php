<?php


namespace Source\Contracts;


class UserAdmin extends User implements UserInterface, UserErrorInterface
{
    private string $error;
    private int $level;

    public function __construct(string $firstName, string $lastName, string $email, int $level)
    {
        parent::__construct($firstName, $lastName, $email);
        $this->level = $level;
    }

    /**
     * @param string $error
     */
    public function setError(string $error): void
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

}
