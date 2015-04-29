<?php


namespace Mpwar\Tennis;


class Match {

    const PLAYER_1 = "p1";
    const PLAYER_2 = "p2";
    const NORMAL_POINT = 15;
    const LAST_POINT = 10;
    const ADVANTAGE_OR_WIN = 50;
    private $player1Points = 0;
    private $player2Points = 0;



    public function score($player)
    {
        $this->incrementPoint($player);

        if($player = $this->playerHasWinTheGame()){
            return $player . " ". "game";
        }
        if($player = $this->playerHasAdvantage()){
            return $player . " ". "advantage";
        }
        if(40 == $this->player1Points && 40 == $this->player1Points){

            return 'deuce';
        }


        return self::PLAYER_1 ." ". $this->player1Points . " - " . self::PLAYER_2 ." ". $this->player2Points;
    }


    public function playerHasAdvantage(){
        if(self::ADVANTAGE_OR_WIN == $this->player1Points && 40 == $this->player2Points){
            return self::PLAYER_1;
        }elseif(self::ADVANTAGE_OR_WIN == $this->player2Points && 40 == $this->player1Points){
            return self::PLAYER_2;
        }
        return false;
    }

    public function playerHasWinTheGame(){
        if(self::ADVANTAGE_OR_WIN == $this->player1Points && 40 > $this->player2Points){
            return self::PLAYER_1;
        }elseif(self::ADVANTAGE_OR_WIN == $this->player2Points && 40 > $this->player1Points){
            return self::PLAYER_2;
        }
        return false;
    }

    public function incrementPoint($player){

        if($player == self::PLAYER_1){
            $this->incrementFirstPlayerPoints();

        }else{

            $this->incrementSecondPlayerPoints();
        }

    }
    public function incrementFirstPlayerPoints(){
        if($this->player1Points < 30){
            $this->player1Points += self::NORMAL_POINT;
        }else{
            $this->player1Points += self::LAST_POINT;
        }
    }

    public function incrementSecondPlayerPoints(){
        if($this->player2Points < 30){
            $this->player2Points += self::NORMAL_POINT;
        }else{
            $this->player2Points += self::LAST_POINT;
        }
    }


}