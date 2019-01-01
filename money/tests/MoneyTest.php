<?php
declare(strict_types=1);

namespace Money\Tests;

use PHPUnit\Framework\TestCase;
use Money\Franc;
use Money\Dollar;

class MoneyTest extends TestCase
{
    /**
     * @covers \Money\Dollar::times()
     */
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $this->assertTrue($five->times(2)->equals(new Dollar(10)));
        $this->assertTrue($five->times(3)->equals(new Dollar(15)));
    }

    /**
     * @covers \Money\Dollar::equals()
     */
    public function testEquality()
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }

    /**
     * @covers \Money\Franc::times()
     */
    public function testFrancMultiplication()
    {
        $five = new Franc(5);
        $this->assertTrue($five->times(2)->equals(new Franc(10)));
        $this->assertTrue($five->times(3)->equals(new Franc(15)));
    }
}
