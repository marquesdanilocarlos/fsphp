<?php


namespace Source\Heranca\Event;


use Source\Heranca\Address;

class LiveEvent extends Event
{
    private Address $address;


    public function __construct(string $event, \DateTime $date, float $price, int $vacancies, Address $address)
    {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }


}
