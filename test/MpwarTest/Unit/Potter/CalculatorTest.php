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

        $this->assertSame(8, $result,  "Buying one book does not earn a discount");
    }

    /** @test */
    public function shouldBuyMultiplesDifferentBooks()
    {
        $transformer = new Calculator;
        $transformer->buyBook(Calculator::BOOK_1);
        $transformer->buyBook(Calculator::BOOK_2);
        $result = $transformer->buyBook(Calculator::BOOK_3);


        $this->assertSame(21.6, $result,  "Buying multiples of different book has discount");
    }
}