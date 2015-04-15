<?php

namespace MpwarTest\Unit\Numbers;

use Mpwar\Numbers\Numbers;

final class NumbersTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldDuplicateList()
    {
        $originalArray = [1,2,3,4,5,1,2,3,4,5];
        $number = new Numbers;
        $resultArray = $number->handleList([1,2,3,4,5], 'x');

        $this->assertTrue(($originalArray == $resultArray), "duplicates the list");
    }

    /** @test */
    public function shouldCreateNewEntry()
    {
        $numberToEntry = 15;
        $number = new Numbers;
        $resultArray = $number->handleList([1,2,3,4,5], 's');

        $this->assertTrue(($numberToEntry == $resultArray[0]),"Creates a new entry at the beginning of the list containing the sum of all the list numbers" );


    }
}