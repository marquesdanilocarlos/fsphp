<?php


namespace Source\Heranca\Event;


class Event
{
    private string $event;
    private \DateTime $date;
    private float $price;

    private $register;
    protected ?int $vacancies;

    /**
     * Event constructor.
     * @param string $event
     * @param \DateTime $date
     * @param float $price
     * @param int|null $vacancies
     */
    public function __construct(string $event, \DateTime $date, float $price, int $vacancies = null)
    {
        $this->event = $event;
        $this->date = $date;
        $this->price = $price;
        $this->vacancies = $vacancies;
    }

    public function register(string $fullName, string $email)
    {
        if ($this->vacancies < 1) {
            echo "<p class='trigger warning'>Desculpe {$fullName}, mas as vagas se esgotaram.</p>";
            return;
        }

        $this->setRegister($fullName, $email);
        $this->vacancies -= 1;
        echo "<p class='trigger accept'>Parabéns, {$fullName}, vaga garantida!.</p>";
    }

    /**
     * @param mixed $register
     */
    protected function setRegister(string $fullName, string $email): void
    {
        $this->register = ["name" => $fullName, "email" => $email];
    }

    /**
     * @return string
     */
    public function getEvent(): string
    {
        return $this->event;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): string
    {
        return $this->date->format("d/m/Y H:i:s");
    }

    /**
     * @return float
     */
    public function getPrice(): string
    {
        return "R$ " . number_format($this->price, 2, ",", ".");
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @return int
     */
    public function getVacancies(): int
    {
        return $this->vacancies;
    }


}
