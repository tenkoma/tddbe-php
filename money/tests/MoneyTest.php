<?php
declare(strict_types=1);

namespace Money\Tests;

use PHPUnit\Framework\TestCase;
use Money\Money;

class MoneyTest extends TestCase
{
    /**
     * @covers \Money\Dollar::times()
     */
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
    }

    /**
     * @covers \Money\Dollar::equals()
     * @covers \Money\Franc::equals()
     */
    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /**
     * @covers \Money\Money::currency()
     */
    public function testCurrency()
    {
        $this->assertSame("USD", Money::dollar(1)->currency());
        $this->assertSame("CHF", Money::franc(1)->currency());
    }
}
