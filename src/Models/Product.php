<?php
namespace Ecomais\Models;

use Ecomais\Interfaces\ProductInterface;
use Ecomais\Models\DataException;

class Product implements ProductInterface
{

    const ACTIVATED = true;
    const DISABLED = false;

    protected int $id;
    protected string $name;
    protected float $price;
    protected string $brand;
    protected string $manufacturer;
    protected string $merchant;
    protected string $clt;
    protected string $date;
    protected string $desc;
    protected string $period;
    protected int $quant;
    protected int $fkCompany;
    protected bool $status;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        if (empty($id)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (empty($name)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->name = trim($name);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        if (empty($price)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->price = $price;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        if (empty($brand)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->brand = trim($brand);
    }

    public function getQuantity(): int
    {
        return $this->quant;
    }

    public function setQuantity(int $quantity): void
    {
        if (empty($quantity)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->quant = trim($quantity);
    }

    public function getClassification(): string
    {
        return $this->category;
    }

    public function setClassification(string $clt): void
    {
        if (empty($clt)) throw new DataException('Null values', DataException::REQ_INVALID);
        $this->clt = trim($clt);
    }

    public function getDescription(): string
    {
        return $this->desc;
    }

    public function setDescription(string $desc): void
    {
        if (empty($desc)) throw new DataException('Null values', DataException::REQ_INVALID);
        $this->desc = trim($desc);
    }

    public function getPeriod(): string
    {
        return $this->pd;
    }

    public function setPeriod(string $pd): void
    {
        if (empty($pd)) throw new DataException('Null values', DataException::REQ_INVALID);
        $this->pariod = trim($pd);
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        if (empty($status)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->status = trim($status);
    }

    public function getFk_Company(): int
    {
        return $this->fkCompany;
    }

    public function setFk_Company(int $fkCompany): void
    {
        if (empty($fkCompany)) throw new DataException('Null values', DataException::REQ_INVALID);

        $this->fkCompany = trim($fkCompany);
    }

    public function createAt(): string
    {
        date_default_timezone_set("America/Sao_paulo");
        $this->date =   date('Y-m-d(N)A%H:i:s');
        return $this->date;
    }
}
