<?php

namespace Source\Interpretation;

class Product
{
    public string $name;
    private string $price;
    private array $data;
    private static int $instances = 0;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        self::$instances++;
    }


    public function __set($name, $value)
    {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        if (empty($this->data[$name])) {
            $this->notFound(__FUNCTION__, $name);
        }

        return $this->data[$name];
    }

    public function __isset($name)
    {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __unset($name)
    {
        trigger_error(__FUNCTION__ . ": Acesso negado à propriedade {$name}", E_USER_ERROR);
    }

    public function __call($name, $arguments)
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        return self::$instances;
    }


    public function __toString()
    {
       return "<p class='trigger'>O curso {$this->name} custa {$this->price}</p>";
    }

    public function __invoke($parameter1, $parameter2)
    {
        var_dump($parameter1, $parameter2);
    }



    public function handler(string $name, float $price)
    {
        $this->name = $name;
        $this->price = number_format($price, 2 , ",", ".");
    }

    private function notFound(string $method, string $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existe em:" . __CLASS__ .  "</p>";
    }
}
