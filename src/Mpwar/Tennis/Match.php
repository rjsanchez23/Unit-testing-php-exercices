<?php


namespace Mpwar\Tennis;


class Match {

    const PLAYER_1 = "p1";
    const PLAYER_2 = "p2";
    private $player1Points = 0;
    private $player2Points = 0;


    public function score($player)
    {
        if($player == self::PLAYER_1){
            $this->player1Points = 15;
        }else{
            $this->player2Points = 15;
        }
        return self::PLAYER_1 ." ". $this->player1Points . " - " . self::PLAYER_2 ." ". $this->player2Points;
    }

}