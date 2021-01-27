<?php

use Numeral\Numeral;
use PHPUnit\Framework\TestCase;

class PercentagesTest extends TestCase
{
    public function testPercentageFormatDecimal()
    {
        $this->assertEquals('43%', Numeral::number('0.43')->format('0%'));
    }

    public function testPercentageFormatDecimalNegative()
    {
        $this->assertEquals('-43%', Numeral::number('-0.43')->format('0%'));
    }
}