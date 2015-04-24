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

    /** @test */
    public function shouldSuccessIfSolvedWithThreeMovements()
    {
        $solver = new Solver;
        $result = $solver->solve(2);
        $this->assertEquals(
            array('#1 -> #2', '#1 -> #3', '#2 -> #3'),
            $result,
            "The movements should be three with two disks. Result should be: #1 -> #2', '#1 -> #3', '#2 -> #3'");

    }

    /** @test */
    public function shouldSuccessIfSolvedWithSevenMovements()
    {
        $solver = new Solver;
        $result = $solver->solve(3);
        $this->assertEquals(
            array(
                '#1 -> #3',
                '#1 -> #2',
                '#3 -> #2',
                '#1 -> #3',
                '#2 -> #1',
                '#2 -> #3',
                '#1 -> #3'
            ),
            $result,
            "The movements should be seven with two disks: ");

    }

    /** @test */
    public function shouldSuccessIfSolvedWithxMovements()
    {
        $solver = new Solver;
        $result = $solver->solve(5);

        $this->assertEquals(
            array(
                "#1 -> #3",
                "#1 -> #2",
                "#3 -> #2",
                "#1 -> #3",
                "#2 -> #1",
                "#2 -> #3",
                "#1 -> #3",
                "#1 -> #2",
                "#3 -> #2",
                "#3 -> #1",
                "#2 -> #1",
                "#3 -> #2",
                "#1 -> #3",
                "#1 -> #2",
                "#3 -> #2",
                "#1 -> #3",
                "#2 -> #1",
                "#2 -> #3",
                "#1 -> #3",
                "#2 -> #1",
                "#3 -> #2",
                "#3 -> #1",
                "#2 -> #1",
                "#2 -> #3",
                "#1 -> #3",
                "#1 -> #2",
                "#3 -> #2",
                "#1 -> #3",
                "#2 -> #1",
                "#2 -> #3",
                "#1 -> #3"
            ),
            $result,
            "The movements should be thirty with five disks: ");

    }



}
