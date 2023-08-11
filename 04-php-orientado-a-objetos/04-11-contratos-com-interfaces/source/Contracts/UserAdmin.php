<?php

namespace Source\Contracts;

class UserAdmin extends User implements UserInterface, UserErrorInterface
{
    private string $error;
    private int $level;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        parent::__construct($firstName, $lastName, $email);
        $this->level = 10;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

}