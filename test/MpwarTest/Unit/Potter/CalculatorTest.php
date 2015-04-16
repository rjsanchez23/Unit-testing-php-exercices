<?php

namespace MpwarTest\Unit\Potter;


use Mpwar\Potter\Calculator;

final class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function shouldBuyOneBook()
    {
        $transformer = new Calculator;
        $result = $transformer->buyBook(Calculator::BOOK_1);

        $this->assertSame(8, $result,  "Buying one or multiples of the same book does not earn a discount");
    }
}