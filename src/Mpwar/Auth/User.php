<?php

namespace Mpwar\Auth;

class User {

    private $email;
    private $username;
    private $password;

    public function __construct($email, $username, $password = null)
    {

        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }


} 