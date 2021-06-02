<?php


namespace Source\Contracts;


interface UserInterface
{
    //public function __construct(string $firstName, string $lastName, string $email);

    //public function setEmail(string $email);

    public function getFirstName();

    public function getLastName();

    public function getEmail();
}
