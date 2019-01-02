<?php
declare(strict_types=1);

namespace Money;

class Pair
{
    /** @var string */
    private $from;

    /** @var string */
    private $to;

    /**
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param Pair $pair
     * @return bool
     */
    public function equals(Pair $pair): bool
    {
        return $this->from === $pair->from && $this->to === $pair->to;
    }

    /**
     * @return int
     */
    public function hashCode(): int
    {
        return 0;
    }
}
