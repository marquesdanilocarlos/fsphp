<?php

namespace Source\Core;

/**
 *
 */
class Session
{
    /**
     *
     */
    public function __construct()
    {
        if (!session_id()) {
            session_save_path(CONF_SESSION_PATH);
            session_start();
        }
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get(string $name)
    {
        if (empty($_SESSION[$name])) {
            return null;
        }

        return $_SESSION[$name];
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return $this->has($name);
    }


    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function set(string $key, $value): self
    {
        $value = is_array($value) ?: (object)$value;
        $_SESSION[$key] = $value;

        return $this;
    }

    /**
     * @return object|null
     */
    public function all(): ?object
    {
        return (object)$_SESSION;
    }

    /**
     * @param string $key
     * @return self
     */
    public function unset(string $key): self
    {
        unset($_SESSION[$key]);
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @return $this
     */
    public function regenerate(): self
    {
        session_regenerate_id(true);
        return $this;
    }

    /**
     * @return $this
     */
    public function destroy(): self
    {
        session_destroy();
        return $this;
    }

    public function flash(): ?Message
    {
        if (!$this->has('flash')) {
            return null;
        }

        $flash = $this->flash;
        $this->unset('flash');
        return $flash;
    }
}