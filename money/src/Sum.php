<?php
declare(strict_types=1);

namespace Money;

class Sum implements Expression
{
    /** @var Expression */
    public $augend;

    /** @var Expression */
    public $addend;

    /**
     * @param Expression $augend
     * @param Expression $addend
     */
    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression
    {
        return null;
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->getAmount()
            + $this->addend->reduce($bank, $to)->getAmount();
        return new Money($amount, $to);
    }
}
