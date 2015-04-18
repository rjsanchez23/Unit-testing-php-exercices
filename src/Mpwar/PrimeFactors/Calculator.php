<?php

namespace Mpwar\PrimeFactors;

final class Calculator
{

    function calculate($number)
    {
        $result = $this->primeFactor($number);
        sort($result);
        return $result;
    }

    private function primeFactor($number)
    {

        $squareRoot = sqrt($number);
        for ($primeFactor = 2; $primeFactor <= $squareRoot; $primeFactor++) {
            if ($number % $primeFactor == 0) {
                return array_merge($this->primeFactor($number / $primeFactor), array($primeFactor));
            }
        }

        return array($number);
    }


}
