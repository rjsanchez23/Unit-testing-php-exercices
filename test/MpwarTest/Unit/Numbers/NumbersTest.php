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

        $this->assertTrue(($originalArray == $resultArray), "Duplicates the list");
    }

    /** @test */
   /* public function shouldCreateNewEntry()
    {
        $originalArray = [1,2,3,4,5,1,2,3,4,5];
        $number = new Numbers;
        $resultArray = $number->handleList([1,2,3,4,5], 'x');

        $this->assertTrue(($originalArray == $resultArray), "Duplicates the list");
    }*/
}