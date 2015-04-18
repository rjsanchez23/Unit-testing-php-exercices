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

    /** @test */
    public function ShouldBeFalse()
    {
        $detector = new Detector;
        $isPalindrome = $detector->isPalindrome("mpwar");
        $this->assertFalse($isPalindrome, "The String shouldn't be a Palindrome");
    }


}
