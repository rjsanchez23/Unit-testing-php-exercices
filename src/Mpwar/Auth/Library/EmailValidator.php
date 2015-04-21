<?php


namespace Mpwar\Auth\Library;


class EmailValidator {

    public function validate($email){

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException('Invalid email');
        }
    }
}