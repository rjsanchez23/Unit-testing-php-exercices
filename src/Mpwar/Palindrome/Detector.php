<?php

namespace Mpwar\Palindrome;

final class Detector{



    public function isPalindrome($string)
    {
        $string = str_replace(' ', '', $string);
        $reverseString = strrev ($string);
        $result = ($string == $reverseString)? true : false;
        return $result;
    }

}