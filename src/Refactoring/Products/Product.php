<?php

namespace Refactoring\Products;

use Brick\Math\BigDecimal;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Product
{
    private const ERROR_NO_PRICE = "No price";
    private const ERROR_NO_COUNTER = "No counter";
    private const ERROR_NO_LONG_DESC = "No long desc";
    private const ERROR_NO_DESC = "No  desc";

    private const FORMAT_SLUG = " *** ";
    private const FORMAT_EMPTY = "";

    /**
     * @var ProductRepo
     */
    private $productRepo;

    /**
     * Product constructor.
     * @param BigDecimal|null $price
     * @param string|null $desc
     * @param string|null $longDesc
     * @param int|null $counter
     * @throws \Exception
     */
    public function __construct(?BigDecimal $price, ?string $desc, ?string $longDesc, ?int $counter)
    {
        $this->productRepo = new ProductRepo();
        $this->generateSerialNumber();

        $this->productRepo->setPrice(($price) ? new ProductPrice($price) : null);
        $this->productRepo->setDesc($desc);
        $this->productRepo->setLongDesc($longDesc);
        $this->productRepo->setCounter(($counter) ? new ProductCounter($counter) : null);
    }

    /**
     * @return $this
     */
    public function generateSerialNumber(): self
    {
        $this->productRepo->setSerialNumber(Uuid::uuid4());
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function decrementCounter(): void
    {
        $this->throwExceptionIfPriceNotExist();
        $this->throwExceptionIfCounterNotExist();

        $counter = $this->productRepo->getCounter();
        $counter->decrement();
        $this->productRepo->setCounter($counter);
    }

    /**
     * @throws \Exception
     */
    public function incrementCounter(): void
    {
        $this->throwExceptionIfPriceNotExist();
        $this->throwExceptionIfCounterNotExist();

        $counter = $this->productRepo->getCounter();
        $counter->increment();
        $this->productRepo->setCounter($counter);
    }

    /**
     * @param BigDecimal $newPrice
     * @throws \Exception
     */
    public function changePriceTo(BigDecimal $newPrice): void
    {
        $this->throwExceptionIfCounterNotExist();

        $this->productRepo->setPrice($newPrice);
    }
    /**
     * @param string $charToReplace
     * @param string $replaceWith
     * @throws \Exception
     */
    public function replaceCharFromDesc(string $charToReplace, string $replaceWith): void
    {
        $longDesc = $this->productRepo->getLongDesc();
        if(!$longDesc){
            throw new \Exception(self::ERROR_NO_LONG_DESC);
        }

        $desc = $this->productRepo->getDesc();
        if(!$desc){
            throw new \Exception(self::ERROR_NO_DESC);
        }

        $this->productRepo->setLongDesc(str_replace($charToReplace, $replaceWith, $longDesc));
        $this->productRepo->setDesc(str_replace($charToReplace, $replaceWith, $desc));
    }

    /**
     * @return string
     */
    public function formatDesc(): string
    {
        if(!$this->productRepo->getLongDesc() || !$this->productRepo->getDesc()){
            return self::FORMAT_EMPTY;
        }

        return $this->productRepo->getDesc() . self::FORMAT_SLUG . $this->productRepo->getLongDesc();
    }

    /**
     * @throws \Exception
     */
    private function throwExceptionIfPriceNotExist(): void
    {
        if(!$this->productRepo->getPrice()){
            throw new \Exception(self::ERROR_NO_PRICE);
        }
    }

    /**
     * @throws \Exception
     */
    private function throwExceptionIfCounterNotExist(): void
    {
        if(!$this->productRepo->getCounter()){
            throw new \Exception(self::ERROR_NO_COUNTER);
        }
    }
}





















