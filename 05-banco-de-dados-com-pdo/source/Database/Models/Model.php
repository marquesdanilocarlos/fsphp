<?php


namespace Source\Database\Models;


/**
 * Class Model
 * @package Source\Database\Models
 */
abstract class Model
{
    /**
     * @var object|null
     */
    protected ?object $data;

    /**
     * @var \PDOException|null
     */
    protected ?\PDOException $fail;

    /**
     * @var string|null
     */
    protected ?string $message;

    /**
     * @return object|null
     */
    protected function getData(): ?object
    {
        return $this->data;
    }

    /**
     * @return \PDOException|null
     */
    protected function getFail(): ?\PDOException
    {
        return $this->fail;
    }

    /**
     * @return string|null
     */
    protected function getMessage(): ?string
    {
        return $this->message;
    }

    protected function create()
    {

    }

    protected function read()
    {

    }

    protected function update()
    {

    }

    protected function delete()
    {

    }

    protected function safe()
    {

    }

    protected function filter()
    {

    }
}
