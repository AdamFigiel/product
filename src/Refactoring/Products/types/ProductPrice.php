<?php

namespace Refactoring\Products;

class ProductPrice
{
    private $price;

    private const ERROR_INVALID_PRICE = "Invalid price";

    /**
     * ProductPrice constructor.
     * @param BigDecimal $price
     * @throws \Exception
     */
    public function __construct(BigDecimal $price)
    {
        $this->price = $price;
        $this->valid();
    }

    /**
     * @throws \Exception
     */
    public function valid(): void
    {
        if($this->price->getSign() > 0){
            throw new \Exception(self::ERROR_INVALID_PRICE);
        }
    }
}





















