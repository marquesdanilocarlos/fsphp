<?php

namespace Source\Related;

class Address
{
    private string $street;
    private string $number;
    private string $complement;

    /**
     * @param string $street
     * @param string $number
     * @param string $complement
     */
    public function __construct(string $street, string $number, string $complement)
    {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getComplement(): string
    {
        return $this->complement;
    }

}