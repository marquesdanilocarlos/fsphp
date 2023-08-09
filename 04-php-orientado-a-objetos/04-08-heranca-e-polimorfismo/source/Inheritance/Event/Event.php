<?php

namespace Source\Inheritance\Event;

class Event
{
    private string $name;
    private \DateTime $date;
    private float $price;

    private array $registries;
    protected ?int $vacancies;

    /**
     * @param string $name
     * @param \DateTime $date
     * @param float $price
     * @param ?int $vacancies
     */
    public function __construct(string $name, \DateTime $date, float $price, ?int $vacancies)
    {
        $this->name = $name;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function register(string $fullName, string $email)
    {
        if ($this->vacancies < 1) {
            echo "<p class='trigger error'>Desculpe, {$fullName}, mas as vagas se esgotaram.</p>";
            return;
        }

        $this->setRegistries($fullName, $email);
        $this->vacancies -= 1;
        echo "<p class='trigger accept'>Parabéns, {$fullName}, vaga garantida.</p>";
    }

    public function setRegistries(string $fullName, string $email)
    {
        $this->registries[] = [
            "name" => $fullName,
            "email" => $email
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDate(): string
    {
        return $this->date->format("d/m/Y H:i:s");
    }

    public function getPrice(): string
    {
        return number_format($this->price, 2, ",", ".");
    }

    public function getRegistries(): array
    {
        return $this->registries;
    }

    public function getVacancies(): int
    {
        return $this->vacancies;
    }


}