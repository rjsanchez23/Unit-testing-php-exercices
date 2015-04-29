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

}