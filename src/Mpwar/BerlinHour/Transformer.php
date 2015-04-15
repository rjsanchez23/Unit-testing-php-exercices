<?php


namespace Mpwar\BerlinHour;


final class Transformer {

    public function fromDigitalToBerlin($time){
        $time = explode($time, ":");
        if( $seconds % 2 == 0){
            return 1;
        } else {
            return 0;
        }
    }

}