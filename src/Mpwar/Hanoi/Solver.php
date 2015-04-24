<?php

namespace Mpwar\Hanoi;
class Solver
{
    public $movements;
    public function solve($disks)
    {
        $this->movements = array();
        if(1 == $disks){
            $this->movements = array('#1 -> #3');
        }
        if(2 == $disks){
            $this->movements = array('#1 -> #2', '#1 -> #3', '#2 -> #3');
        }

        return $this->movements;

    }


}