<?php


namespace MpwarTest\SetUp;


use Mpwar\Tennis\Match;

class TennisTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function shouldSuccessIfFirstPlayerWinsWithFiveTeen()
    {

        $match = new Match();
        $result = $match->score(Match::PLAYER_1);
        $spectedResult = 'p1 15 - p2 0';
        $this->assertEquals($spectedResult, $result, "The espectected result is that player 1 wins by 15" );

    }
    /** @test */
    public function shouldSuccessIfSecondPlayerWinsWithFiveTeen()
    {

        $match = new Match();
        $result = $match->score(Match::PLAYER_2);
        $spectedResult = 'p1 0 - p2 15';
        $this->assertEquals($spectedResult, $result, "The espectected result is that player 2 wins by 15" );

    }

}