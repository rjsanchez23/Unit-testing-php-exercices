<?php

namespace MpwarTest\Unit\Potter;


use Mpwar\Potter\Calculator;

final class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function shouldBuyOneBook()
    {
        $calculator = new Calculator;
        $result = $calculator->buyBook(Calculator::BOOK_1);

        $this->assertSame(8, $result,  "Buying one book does not earn a discount");
    }

    /** @test */
    public function shouldBuyMultiplesDifferentBooks()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_1);
        $calculator->buyBook(Calculator::BOOK_2);
        $result = $calculator->buyBook(Calculator::BOOK_3);


        $this->assertSame(21.6, $result,  "Buying multiples of different book has discount");
    }

    /** @test */
    public function shouldBuyMultiplesSameBooks()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_1);
        $calculator->buyBook(Calculator::BOOK_1);
        $result = $calculator->buyBook(Calculator::BOOK_1);


        $this->assertSame(24, $result,  "Buying multiples of the same book has not earn discount");
    }
}