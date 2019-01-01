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
        $this->assertTrue((Money::franc(5))->equals(Money::franc(5)));
        $this->assertFalse((Money::franc(5))->equals(Money::franc(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /**
     * @covers \Money\Franc::times()
     */
    public function testFrancMultiplication()
    {
        $five = Money::franc(5);
        $this->assertTrue($five->times(2)->equals(Money::franc(10)));
        $this->assertTrue($five->times(3)->equals(Money::franc(15)));
    }
}
