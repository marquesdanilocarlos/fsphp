<?php


namespace Source\Database\Entity;


class UserEntity
{
    private string $id;
    private string $first_name;
    private string $last_name;
    private string $email;
    private ?string $document;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }


}
