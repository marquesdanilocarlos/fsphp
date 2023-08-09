<?php

namespace Source\Inheritance;

class Address
{
    private string $street;
    private string $number;
    private ?string $complement;

    /**
     * @param string $street
     * @param string $number
     * @param ?string $complement
     */
    public function __construct(string $street, string $number, string $complement = null)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }


}