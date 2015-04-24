<?php

namespace Mpwar\Hanoi;
class Solver
{
    public $movements;

    public function solve($disks)
    {

        $this->movements = array();
        $this->hanoi($disks, "#1", "#2", "#3");
        return $this->movements;

    }

    private function hanoi($discks, $startStick, $auxiliarStick, $endStick)
    {

        if ($discks == 0) {

            return;

        } else {

            $this->hanoi(($discks - 1), $startStick, $endStick, $auxiliarStick);
            $this->movements[] = "$startStick -> $endStick";
            $this->hanoi(($discks - 1), $auxiliarStick, $startStick, $endStick);

        }

    }


}