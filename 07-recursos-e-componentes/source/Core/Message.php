<?php

namespace Source\Core;

use BadMethodCallException;

/**
 * @method Message success($message)
 * @method Message error($message)
 * @method Message warning($message)
 * @method Message info($message)
 */
class Message
{
    private string $text = '';
    private string $type = '';

    private array $allowedMethods = [
        'success' => CONF_MESSAGE_SUCCESS,
        'error' => CONF_MESSAGE_ERROR,
        'warning' => CONF_MESSAGE_WARNING,
        'info' => CONF_MESSAGE_INFO
    ];

    public function __call(string $name, array $arguments)
    {
        if (!in_array($name, array_keys($this->allowedMethods))) {
            throw new BadMethodCallException("O método {$name} não pode ser executado neste contexto.");
        }

        return $this->dispatch($name, $arguments[0]);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function dispatch(string $type, string $message): self
    {
        $this->type = $this->allowedMethods[$type];
        $this->text = $this->filter($message);
        return $this;
    }

    public function render(): string
    {
        return "<div class='" . CONF_MESSAGE_CLASS . " {$this->getType()}'> {$this->getText()}</div>";
    }

    public function json(): string
    {
        return json_encode(['error' => $this->getText()]);
    }

    public function flash(): void
    {
        (new Session())->set('flash', $this);
    }

    private function filter(string $message): string
    {
        return filter_var($message, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}