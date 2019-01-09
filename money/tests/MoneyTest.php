<?php
declare(strict_types=1);

namespace Money\Tests;

use Money\Bank;
use Money\Sum;
use PHPUnit\Framework\TestCase;
use Money\Money;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = Money::dollar(5);
        $this->assertTrue($five->times(2)->equals(Money::dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::dollar(15)));
    }

    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

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

    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $this->assertTrue($sum->augend->equals($five));
        $this->assertTrue($sum->addend->equals($five));
    }

    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank;
        $result = $bank->reduce($sum, "USD");
        $this->assertTrue($result->equals(Money::dollar(7)));
    }

    public function testReduceMoney()
    {
        $bank = new Bank;
        $result = $bank->reduce(Money::dollar(1), "USD");
        $this->assertTrue($result->equals(Money::dollar(1)));
    }

    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank;
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertTrue($result->equals(Money::dollar(1)));
    }

    public function testIdentityRate()
    {
        $this->assertSame(1, (new Bank())->rate("USD", "USD"));
    }

    public function testMixedAddition()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce($fiveBucks->plus($tenFrancs), "USD");
        $this->assertTrue($result->equals(Money::dollar(10)));
    }

    public function testSumPlusMoney()
    {
        $fiveBucks = Money::dollar(5);
        $tenFrancs = Money::franc(10);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = (new Sum($fiveBucks, $tenFrancs))->plus($fiveBucks);
        $result = $bank->reduce($sum, "USD");
        $this->assertTrue($result->equals(Money::dollar(15)));
    }
}
