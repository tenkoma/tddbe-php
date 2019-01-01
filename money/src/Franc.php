<?php
declare(strict_types=1);

namespace Money;

class Franc extends Money
{
    /**
     * @param int $amount
     * @param string $currency
     */
    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }
}
