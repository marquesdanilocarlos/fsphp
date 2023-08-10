<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class Current extends Account
{
    private float $limit;

    public function __construct(string $branch, string $account, User $client, float $balance, float $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    final public function deposit(float $value): void
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} realizado.", Trigger::ACCEPT);
    }

    final public function withdraw(float $value): void
    {
        $saving = $this->getSaving();
        if ($value >= $saving) {
            Trigger::show("Saldo insuficiente, você tem {$this->toBrl($saving)}, disponível.");
            return;
        }

        $this->balance -= abs($value);

        if ($this->balance < 0) {
            $this->balance -= $this->getTax();
            Trigger::show("Taxa de uso de limite: {$this->getTax()}");
        }

        Trigger::show(
            "Saque de {$this->toBrl($value)} realizado com sucesso.",
            Trigger::ERROR
        );
    }

    public function getSaving(): float
    {
        return ($this->balance + $this->limit);
    }

    private function getTax(): float
    {
        return abs($this->balance * 0.006);
    }


}