<?php

namespace Source\Inheritance\Event;

use Source\Inheritance\Address;

class Live extends Event
{
    private Address $address;

    public function __construct(string $name, \DateTime $date, float $price, int $vacancies, Address $address)
    {
        parent::__construct($name, $date, $price, $vacancies);
        $this->address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}