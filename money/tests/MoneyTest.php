<?php
declare(strict_types=1);

namespace Money\Tests;

use Money\Bank;
use PHPUnit\Framework\TestCase;
use Money\Money;

/**
 * @coversDefaultClass \Money\Money
 */
class MoneyTest extends TestCase
{
    /**
     * @covers ::times()
     */
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
    }

    /**
     * @covers ::equals()
     */
    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /**
     * @covers ::currency()
     */
    public function testCurrency()
    {
        $this->assertSame("USD", Money::dollar(1)->currency());
        $this->assertSame("CHF", Money::franc(1)->currency());
    }

    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertTrue($reduced->equals(Money::dollar(10)));
    }
}
