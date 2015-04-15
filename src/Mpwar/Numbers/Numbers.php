<?php
namespace Mpwar\Numbers;

final class Numbers
{
    public function handleList(array $numbers, $operations)
    {
        if('x' == $operations){
            return array_merge($numbers, $numbers);
        }

    }
}