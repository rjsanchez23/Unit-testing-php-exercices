<?php

namespace MpwarTest\Hanoi;


use Mpwar\Hanoi\Solver;
use PHPUnit_Framework_TestCase;

final class SolverTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldSuccessIfMoveOneToThree()
    {
        $solver = new Solver;
        $result = $solver->solve(1);
        $this->assertEquals(array('#1 -> #3'),$result,"The movement should be one with one disk");

    }

}
