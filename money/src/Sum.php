<?php
declare(strict_types=1);

namespace Money;

class Sum implements Expression
{
    /** @var Money */
    public $augend;

    /** @var Money */
    public $addend;

    /**
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(string $to): Money
    {
        $amount = $this->augend->getAmount() + $this->addend->getAmount();
        return new Money($amount, $to);
    }
}
