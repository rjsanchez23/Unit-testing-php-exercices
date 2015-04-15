<?php
namespace Mpwar\Numbers;

final class Numbers
{
    public function handleList(array $numbers, $operations)
    {
        if('x' == $operations){
            return array_merge($numbers, $numbers);
        }

        if('s' == $operations){
            $resultSum = 0;
            foreach($numbers as $number){
                $resultSum += $number;
            }

            array_unshift($numbers, $resultSum);
            return $numbers;
        }

    }
}