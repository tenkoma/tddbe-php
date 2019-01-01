<?php
namespace Money;

class Dollar
{
    /** @var int */
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier) : Dollar
    {
        return new Dollar($this->amount * $multiplier);
    }
}
