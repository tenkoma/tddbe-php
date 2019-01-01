<?php
declare(strict_types=1);

namespace Money;

class Money
{
    /** @var int */
    protected $amount;

    /**
     * @param Money $money
     * @return bool
     */
    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount;
    }
}
