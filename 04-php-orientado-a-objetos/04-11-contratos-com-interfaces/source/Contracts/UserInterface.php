<?php

namespace Source\Contracts;

interface UserInterface
{
    public function setEmail(string $email);

    public function getFirstName();

    public function getLastName();

    public function getEmail();
}