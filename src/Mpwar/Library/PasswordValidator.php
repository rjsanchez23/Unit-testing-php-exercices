<?php


namespace Mpwar\Library;


class PasswordValidator {

    public function validate($password){

        if(!mb_strlen($password) < 6){
            throw new \InvalidArgumentException('Too short password');
        }
    }
}