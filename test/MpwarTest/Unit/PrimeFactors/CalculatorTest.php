<?php

namespace MpwarTest\Unit\PrimeFactors;


use Mpwar\PrimeFactors\Calculator;
use PHPUnit_Framework_TestCase;

final class CalculatorTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldBePrime()
    {
        $calculator = new Calculator();
        $result = $calculator->calculate(23);

        $this->assertSame([23], $result, "The given number is prime, so should return an array with only the same number");
    }


}
