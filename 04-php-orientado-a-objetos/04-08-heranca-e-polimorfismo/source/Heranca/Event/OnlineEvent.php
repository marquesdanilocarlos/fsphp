<?php


namespace Source\Heranca\Event;


class OnlineEvent extends Event
{
    private string $link;
    public function __construct(string $event, \DateTime $date, float $price, string $link, int $vacancies = null)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->link = $link;
    }

    public function register(string $fullName, string $email)
    {
        $this->vacancies += 1;
        $this->setRegister($fullName, $email);
        echo "<p class='trigger accept'>Show, {$fullName}! Cadastrado com sucesso!</p>";
    }


}
