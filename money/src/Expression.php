<?php
declare(strict_types=1);

namespace Money;

interface Expression
{
    /**
     * @param string $to
     * @return Money
     */
    public function reduce(string $to): Money;
}
