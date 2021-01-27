<?php

use Numeral\Numeral;
use PHPUnit\Framework\TestCase;

class TimeTest extends TestCase
{
    public function testTimeFormatWithSeconds()
    {
        $this->assertEquals('0:00:25', Numeral::number('25')->format('00:00:00'));
    }

    public function testTimeFormatWithMinutes()
    {
        $this->assertEquals('0:03:58', Numeral::number('238')->format('00:00:00'));
    }

    public function testTimeFormatWithHours()
    {
        $this->assertEquals('17:44:06', Numeral::number('63846')->format('00:00:00'));
    }
}