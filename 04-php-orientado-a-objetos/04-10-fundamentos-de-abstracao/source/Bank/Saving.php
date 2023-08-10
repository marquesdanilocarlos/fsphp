<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class Saving extends Account
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
        Trigger::show("Depósito de {$this->toBrl($value)} realizado.", Trigger::ACCEPT);
    }

    public function withdraw(float $value): void
    {
        if ($this->balance <= $value) {
            Trigger::show(
                "Saldo insuficiente, você tem {$this->toBrl($this->balance)} disponível.",
                Trigger::WARNING
            );
            return;
        }

        $this->balance -= abs($value);
        Trigger::show(
            "Saque de {$this->toBrl($value)} realizado com sucesso.",
            Trigger::ERROR
        );
    }
}