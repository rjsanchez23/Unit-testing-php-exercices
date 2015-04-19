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

    /** @test */
    public function shouldNotBePrime()
    {
        $calculator = new Calculator();
        $result = $calculator->calculate(32);

        $this->assertSame([2, 2, 2, 2, 2], $result, "The given number is not prime, so should return an array with another numbers");
    }

    /** @test */
    public function shouldBeZero()
    {
        $calculator = new Calculator();
        $result = $calculator->calculate(0);

        $this->assertSame([0], $result, "The given number is 0, so should return an array with 0");
    }


}
