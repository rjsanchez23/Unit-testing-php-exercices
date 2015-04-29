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

    /** @test */
    public function shouldSuccessIfDeuce()
    {

        $match = new Match();
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);

        $match->score(Match::PLAYER_2);
        $match->score(Match::PLAYER_2);

        $result = $match->score(Match::PLAYER_2);
        $spectedResult = 'deuce';
        $this->assertEquals($spectedResult, $result, "The espectected result is deuce in the math" );

    }

    /** @test */
    public function shouldSuccessIfAdvantagePlayerOne()
    {

        $match = new Match();
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_2);
        $match->score(Match::PLAYER_2);
        $match->score(Match::PLAYER_2);
        $result = $match->score(Match::PLAYER_1);
        $spectedResult = 'p1 advantage';
        $this->assertEquals($spectedResult, $result, "The espectected result is advantage of player 1" );

    }

    /** @test */
    public function shouldSuccessIfAdvantagePlayerTwo()
    {

        $match = new Match();
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_2);
        $match->score(Match::PLAYER_2);
        $match->score(Match::PLAYER_2);
        $result = $match->score(Match::PLAYER_2);
        $spectedResult = 'p2 advantage';
        $this->assertEquals($spectedResult, $result, "The espectected result is advantage of player 2" );

    }

    /** @test */
    public function shouldSuccessIfAPlayerOneWin()
    {

        $match = new Match();
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);
        $match->score(Match::PLAYER_1);


        $result = $match->score(Match::PLAYER_1);
        $spectedResult = 'p1 game';
        $this->assertEquals($spectedResult, $result, "The espectected result is player1 win" );

    }

}