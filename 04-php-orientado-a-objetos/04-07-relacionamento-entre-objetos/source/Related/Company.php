<?php


namespace Source\Related;


class Company
{
    private string $company;
    private Address $address;
    private array $team;
    private array $products;

    /*public function bootCompany(string $company, string $address)
    {
        $this->company = $company;
        $this->address = $address;
    }*/

    public function boot(string $company, Address $address)
    {
        $this->company = $company;
        $this->address = $address;
    }

    public function addProduct(Product $product)
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
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @return string
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
