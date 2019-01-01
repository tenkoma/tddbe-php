<?php
namespace Money\Tests;

use PHPUnit\Framework\TestCase;
use Money\Dollar;

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        $five = new Dollar(5);
        $five->times(2);
        $this->assertSame(10, $five->amount);
    }
}
