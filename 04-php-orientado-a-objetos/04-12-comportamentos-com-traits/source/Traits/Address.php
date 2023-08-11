<?php

namespace Source\Traits;

class Address
{
    private string $street;
    private int $number;

    private string $complement;

    /**
     * @param string $street
     * @param int $number
     * @param string $complement
     */
    public function __construct(string $street, int $number, string $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getComplement(): string
    {
        return $this->complement;
    }

}