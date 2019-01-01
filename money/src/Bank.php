<?php
declare(strict_types=1);

namespace Money;

class Bank
{
    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, string $to): Money
    {
        // FIXME: 仮実装
        return Money::dollar(10);
    }
}
