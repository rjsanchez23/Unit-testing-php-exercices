<?php


namespace Mpwar\User;


class User {

    public $name;
    public $password;
    public $email;

    public function __construct($name = null, $password = null, $email= null){

        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }
}