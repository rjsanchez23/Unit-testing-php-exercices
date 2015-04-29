<?php


namespace Mpwar\Tennis;


class Match {

    const PLAYER_1 = "p1";
    const PLAYER_2 = "p2";
    const NORMAL_POINT = 15;
    const LAST_POINT = 10;
    private $player1Points = 0;
    private $player2Points = 0;



    public function score($player)
    {
        $this->incrementPoint($player);
        if(40 == $this->player1Points && 40 == $this->player1Points){
            return 'deuce';
        }
        return self::PLAYER_1 ." ". $this->player1Points . " - " . self::PLAYER_2 ." ". $this->player2Points;
    }

    public function incrementPoint($player){

        if($player == self::PLAYER_1){
           if($this->player1Points < 30){
               $this->player1Points += self::NORMAL_POINT;
           }else{
               $this->player1Points += self::LAST_POINT;
           }

        }else{

            if($this->player2Points < 30){
                $this->player2Points += self::NORMAL_POINT;
            }else{
                $this->player2Points += self::LAST_POINT;
            }
        }

    }

}