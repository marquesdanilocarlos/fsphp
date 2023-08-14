<?php

namespace Source\Database\Entity;

class User
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private ?string $document;

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }
}