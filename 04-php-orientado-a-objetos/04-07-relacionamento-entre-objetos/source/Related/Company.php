<?php

namespace Source\Related;

class Company
{
    private string $name;
    private Address $address;
    private array $team;
    private array $products;

    /*public function bootCompany(string $name, string $address)
    {
        $this->name = $name;
        $this->address = $address;
    }*/

    public function boot(string $name, Address $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function addTeamMember(string $job, string $firstName, string $lastName)
    {
        $this->team[] = new User($job, $firstName, $lastName);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return array
     */
    public function getTeam(): array
    {
        return $this->team;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

}