<?php

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class ProductRepo
{
    /**
     * @var UuidInterface
     */
    private $serialNumber;

    /**
     * @var ProductPrice
     */
    private $price;

    /**
     * @var string
     */
    private $desc;

    /**
     * @var string
     */
    private $longDesc;

    /**
     * @var ProductCounter
     */
    private $counter;

    /**
     * @param UuidInterface $serialNumber
     * @return $this
     */
    public function setSerialNumber(UuidInterface $serialNumber): self
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    /**
     * @return UuidInterface
     */
    public function getSerialNumber(): UuidInterface
    {
        return $this->serialNumber;
    }

    /**
     * @param ProductPrice $price
     * @return $this
     */
    public function setPrice(ProductPrice $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return ProductPrice
     */
    public function getPrice(): ProductPrice
    {
        return $this->price;
    }

    /**
     * @param $desc
     * @return $this
     */
    public function setDesc($desc): self
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param $longDesc
     * @return $this
     */
    public function setLongDesc($longDesc): self
    {
        $this->longDesc = $longDesc;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongDesc(): string
    {
        return $this->longDesc;
    }

    /**
     * @param ProductCounter $counter
     * @return $this
     * @throws \Exception
     */
    public function setCounter(ProductCounter $counter): self
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * @return ProductCounter
     */
    public function getCounter(): ?ProductCounter
    {
        return $this->counter;
    }
}





















