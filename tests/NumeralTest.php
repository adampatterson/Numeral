<?php

use Numeral\Numeral;
use PHPUnit\Framework\TestCase;

class NumeralTest extends TestCase
{
    public function testNumberFormatWhole()
    {
        $this->assertEquals('85193', Numeral::number('85193.456')->format());
    }

    public function testNumberFormatDecimal()
    {
        $this->assertEquals('85193.46', Numeral::number('85193.456')->format('0.00'));
    }

    public function testNumberFormatFourDecimal()
    {
        $this->assertEquals('85193.4563', Numeral::number('85193.4563433')->format('0.0000'));
    }

    public function testNumberFormatComma()
    {
        $this->assertEquals('85,193.46', Numeral::number('85193.456')->format('0,0.00'));
    }

    public function testNumberFormatDecimalNegative()
    {
        $this->assertEquals('-85193.00', Numeral::number('-85193')->format('0.00'));
    }

    public function testNumberFormatWholeNegative()
    {
        $this->assertEquals('-85193', Numeral::number('-85193.00')->format());
    }

}