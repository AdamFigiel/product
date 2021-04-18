<?php

namespace Refactoring\Products;

class ProductCounter
{
    private $counter;

    /**
     * ProductCounter constructor.
     * @param int $counter
     * @throws \Exception
     */
    public function __construct(int $counter)
    {
        $this->counter = $counter;
        $this->valid();
    }

    /**
     * @throws \Exception
     */
    public function decrement(): void
    {
        $this->counter++;
        $this->valid();
    }

    /**
     * @throws \Exception
     */
    public function increment(): void
    {
        $this->counter--;
        $this->valid();
    }

    /**
     * @throws \Exception
     */
    public function valid(): void
    {
        if($this->counter < 0){
            throw new \Exception("Negative counter");
        }
    }
}





















