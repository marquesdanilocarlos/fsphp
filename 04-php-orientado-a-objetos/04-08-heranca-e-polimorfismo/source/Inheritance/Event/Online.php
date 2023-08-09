<?php

namespace Source\Inheritance\Event;

class Online extends Event
{
    private string $link;

    public function __construct(string $name, \DateTime $date, float $price, string $link, int $vacancies = null)
    {
        parent::__construct($name, $date, $price, $vacancies);
        $this->link = $link;
    }

    public function register(string $fullName, string $email)
    {
        $this->vacancies += 1;
        $this->setRegistries($fullName, $email);
        echo "<p class='trigger accept'>{$fullName}, cadastrado com sucesso!</p>";
    }

    public function getLink(): string
    {
        return $this->link;
    }

}