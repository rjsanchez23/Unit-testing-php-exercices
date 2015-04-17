<?php

namespace MpwarTest\Unit\Potter;


use Mpwar\Potter\Calculator;

final class CalculatorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function shouldBuyOneBook()
    {
        $calculator = new Calculator;
        $result = $calculator->buyBook(Calculator::BOOK_5);

        $this->assertSame(8.00, $result,  "Buying one book does not earn a discount");
    }

    /** @test */
    public function shouldBuyMultipleOfSameBook()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $result = $calculator->buyBook(Calculator::BOOK_3);

        $this->assertSame(72.00, $result,  "Buying multiples copies of the same book does not earn a discount");
    }

    /** @test */
    public function shouldBuyMultiplesDifferentBooks()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_1);
        $calculator->buyBook(Calculator::BOOK_2);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_4);
        $calculator->buyBook(Calculator::BOOK_5);
        $calculator->buyBook(Calculator::BOOK_6);
        $result = $calculator->buyBook(Calculator::BOOK_7);


        $this->assertSame(36.4, $result,  "Buying multiples of different book has discount");
    }


    /** @test */
    public function shouldBuyMultiplesBooks()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_1);
        $calculator->buyBook(Calculator::BOOK_2);
        $calculator->buyBook(Calculator::BOOK_2);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_4);
        $calculator->buyBook(Calculator::BOOK_4);
        $calculator->buyBook(Calculator::BOOK_4);
        $calculator->buyBook(Calculator::BOOK_5);
        $calculator->buyBook(Calculator::BOOK_5);
        $result = $calculator->buyBook(Calculator::BOOK_6);


        $this->assertSame(75.20, $result,  "Buying multiples books has discount");
    }

    /** @test */
    public function shouldBuyMultiplesBooksLessThan5Differents()
    {
        $calculator = new Calculator;
        $calculator->buyBook(Calculator::BOOK_1);
        $calculator->buyBook(Calculator::BOOK_2);
        $calculator->buyBook(Calculator::BOOK_2);
        $calculator->buyBook(Calculator::BOOK_3);
        $calculator->buyBook(Calculator::BOOK_3);
        $result = $calculator->buyBook(Calculator::BOOK_4);


        $this->assertSame(42.4, $result,  "Buying multiples books  but less than 5 differents has discount");
    }
}