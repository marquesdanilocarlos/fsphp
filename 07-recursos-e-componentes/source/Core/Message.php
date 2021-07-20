<?php


namespace Source\Core;


class Message
{
    private ?string $text = null;
    private ?string $type = null;

    /**
     * Tipos permitidos de métodos de renderização que podem ser utilizados
     * @var array
     */
    private static array $allowedTypes = [
        'success' => CONF_MESSAGE_SUCCESS,
        'info' => CONF_MESSAGE_INFO,
        'error' => CONF_MESSAGE_ERROR,
        'warning' => CONF_MESSAGE_WARNING,
        'default' => CONF_MESSAGE_CLASS
    ];

    public function __toString(): string
    {
        return $this->render();
    }

    public function __call(string $name, array $arguments): self
    {
        if (!in_array($name, array_keys(self::$allowedTypes))) {
            return $this->setParams(CONF_MESSAGE_CLASS, "Tipo de mensagem não permitido!");
        }

        return $this->setParams(self::$allowedTypes[$name], $arguments[0]);
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    private function setParams(string $type, string $text): self
    {
        $this->type = $type;
        $this->text = $this->filter($text);

        return $this;
    }

    public function render(): string
    {
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'>{$this->getText()}</div>";
    }

    public function json()
    {
        return json_encode(["error" => $this->getText()]);
    }

    public function flash(): void
    {
        (new Session)->set("flash", $this);
    }

    private function filter(string $text): string
    {
        return filter_var($text, FILTER_SANITIZE_STRIPPED);
    }
}
