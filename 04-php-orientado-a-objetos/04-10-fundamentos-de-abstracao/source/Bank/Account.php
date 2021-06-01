<?php


namespace Source\Bank;


use Source\App\Trigger;
use Source\App\User;

abstract class Account
{
    protected string $branch;
    protected string $account;
    protected User $client;
    protected float $balance;

    /**
     * Account constructor.
     * @param string $branch
     * @param string $account
     * @param User $client
     * @param float $balance
     */
    protected function __construct(string $branch, string $account, User $client, float $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }


    public function extract(): void
    {
        $extract = ($this->balance >= 1) ? Trigger::ACCEPT : Trigger::ERROR;

        Trigger::show("Saldo Atual: {$this->balance}", $extract);
    }

    protected function toBrl(float $value): string
    {
        return "R$" . number_format($value, 2 , ",", ".");
    }

    abstract protected function deposit(float $value);

    abstract protected function withdraw(float $value);

}


