<?php


namespace Source\Bank;


use Source\App\Trigger;
use Source\App\User;

class CurrentAccount extends Account
{
    private float $limit;
    private float $tax = 0.006;

    public function __construct(string $branch, string $account, User $client, float $balance, float $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    final public function deposit(float $value): void
    {
        $this->balance += $value;
        Trigger::show("Depósito de {$this->toBrl($value)} realizado com sucesso!", Trigger::ACCEPT);
    }

    final public function withdraw(float $value): void
    {

        if ($value > ($this->balance + $this->limit)) {
            Trigger::show("Saldo insuficiente, você tem {$this->toBrl($this->balance + $this->limit)} de saldo disponível.", Trigger::WARNING);
            return;
        }

        $this->balance -= abs($value);

        if ($this->balance < 0) {
            $this->balance -= ($this->tax * abs($this->balance));
            Trigger::show("Cobrada uma taxa de {$this->toBrl($this->tax * abs($this->balance))} pelo uso do limite.", Trigger::WARNING);
        }

        Trigger::show("Saque de {$this->toBrl($value)} realizado com sucesso!.", Trigger::ERROR);
    }

}
