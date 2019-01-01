<?php
declare(strict_types=1);

namespace Money;

class Franc
{
    /** @var int */
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Franc
     */
    public function times(int $multiplier): Franc
    {
        return new Franc($this->amount * $multiplier);
    }

    /**
     * @param Franc $dollar
     * @return bool
     */
    public function equals(Franc $franc): bool
    {
        return $this->amount === $franc->amount;
    }
}
