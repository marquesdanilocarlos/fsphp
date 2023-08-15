<?php

namespace Source\Model;

abstract class Model
{
    protected ?\stdClass $data;
    protected ?\PDOException $fail;
    protected ?string $message;

    public function getData(): ?\stdClass
    {
        return $this->data;
    }

    public function getFail(): ?\PDOException
    {
        return $this->fail;
    }

    public function getMessage(): ?string
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

    protected function safe(): ?array
    {
    }

    protected function filter()
    {
    }
}