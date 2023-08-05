<?php

namespace Source\Interpretation;

class Product
{
    public string $name;
    private string $price;
    private array $data;

    public function handler(string $name, float $price)
    {
        $this->name = $name;
        $this->price = number_format($price, 2, ",", ".");
    }

    private function notFound(string $method, string $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existe em " . self::class . "</p>";
    }

    public function __set(string $name, $value): void
    {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        if (!empty($this->data[$name])) {
            return $this->data[$name];
        }

        $this->notFound(__FUNCTION__, $name);
    }

    public function __isset(string $name)
    {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __call($name, $arguments)
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public function __toString(): string
    {
        return "<p class='trigger accept'>Este é um objeto da classe " . self::class . "</p>";
    }

    public function __unset(string $name): void
    {
        trigger_error(__FUNCTION__ . ": Acesso negado à propriedade {$name}");
    }

    public function __invoke($argument): string
    {
        return "<p class='trigger accept'>A classe " . self::class . " foi invocada como uma função...</p>";
    }


}