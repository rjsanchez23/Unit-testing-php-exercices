<?php

namespace MpwarTest\Hanoi;


use Mpwar\Hanoi\Solver;
use PHPUnit_Framework_TestCase;

final class SolverTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldSuccessIfEmptyArrayWithZeroDisks()
    {
        $solver = new Solver;
        $result = $solver->solve(0);
        $this->assertEquals(
            array(),
            $result,
            "The movements should be zero with zero disks. Result should be: array()'");

    }

    /** @test */
    public function shouldSuccessIfMoveOneToThree()
    {
        $solver = new Solver;
        $result = $solver->solve(1);
        $this->assertEquals(array('#1 -> #3'), $result, "The movement should be one with one disk. Result should be: #'#1 -> #3', '#2 -> #3'");

    }


}
