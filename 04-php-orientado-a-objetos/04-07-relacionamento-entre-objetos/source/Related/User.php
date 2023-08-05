<?php

namespace Source\Related;

class User
{
    private string $job;
    private string $firstName;
    private string $lastName;

    /**
     * @param string $job
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(string $job, string $firstName, string $lastName)
    {
        $this->job = $job;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

}