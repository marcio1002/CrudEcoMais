<?php

namespace Ecomais\Models;

class Person
{
    const ENABLED = true;
    const DISABLED = false;

    protected int $id;
    protected string $name;
    protected string $email;
    protected ?string $passwd;
    protected string $uf;
    protected string $locality;
    protected ?string $address;
    protected ?int $cep;
    protected bool $statusAccount;
    protected string $date;

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    /**
     * Pega todos os valores nos atributos da classe
     * @return array
     */
    public function toArray(): array
    {
        $array = array();
        foreach ($this as $key => $val) $array[$key] = $val;
        return $array;
    }

    public function createAt(): string
    {
        date_default_timezone_set("America/Sao_paulo");

        $this->date = date('Y-m-d H:i:s');
        return $this->date;
    }
}
