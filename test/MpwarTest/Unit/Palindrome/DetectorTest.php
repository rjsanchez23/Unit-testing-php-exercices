<?php

namespace MpwarTest\Unit\Detector;


use Mpwar\Palindrome\Detector;

final class DetectorTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function ShouldBeTrue()
    {
        $detector = new Detector;
        $isPalindrome = $detector->isPalindrome("nurses run");
        $this->assertTrue($isPalindrome, "The String should be a Palindrome");
    }

    


}
