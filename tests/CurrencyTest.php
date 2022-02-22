<?php

use Numeral\Numeral;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function testCurrencyFormatWithComma()
    {
        $this->assertEquals('$85,187,993.00', Numeral::number('85187993.00')->format('$0,0.00'));
    }

    public function testCurrencyFormatWholeWithComma()
    {
        $this->assertEquals('$85,187,993', Numeral::number('85187993.00')->format('$0,0'));
    }

    /**
     * @todo https://github.com/adampatterson/Numeral/issues/1
     *
     * @return void
     */
    /*
    public function testCurrencyFormatWhole()
    {
        $this->assertEquals('$85187993', Numeral::number('85187993.00')->format('$0'));
    }

    /**
     * @todo https://github.com/adampatterson/Numeral/issues/1
     *
     * @return void
     */
    /*
     public function testCurrencyFormatWithoutComma()
     {
         $this->assertEquals('$85187993.00', Numeral::number('85187993.00')->format('$0.00'));
     }
    */
}
