<?php

namespace Source\Contracts;

interface UserErrorInterface
{
    public function setError(string $error);

    public function getError();
}