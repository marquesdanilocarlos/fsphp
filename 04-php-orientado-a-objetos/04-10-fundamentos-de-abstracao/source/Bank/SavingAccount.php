<?php


namespace Source\Bank;


use Source\App\Trigger;
use Source\App\User;

class SavingAccount extends Account
{

    private float $interest;

    public function __construct(string $branch, string $account, User $client, float $balance)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->interest = 0.006;
    }

    public function deposit(float $value): void
    {
        $this->balance += $value + ($value * $this->interest);
        Trigger::show("Depósito de {$this->toBrl($value)}", Trigger::ACCEPT);
    }

    public function withdraw(float $value)
    {
        if ($this->balance < $value) {
            Trigger::show("Saldo insufuciente, você possui {$this->toBrl($this->balance)} de saldo", Trigger::WARNING);
            return;
        }

        $this->balance -= abs($value);
        Trigger::show("Saque de {$this->toBrl($value)} realizado com sucesso!", Trigger::ERROR);
    }

}
