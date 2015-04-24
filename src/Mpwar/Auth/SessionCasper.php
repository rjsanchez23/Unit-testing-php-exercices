<?php

namespace Mpwar\Auth;

use InvalidArgumentException;

class SessionCasper
{
    private $session;

    public function isLoggedIn($username)
    {
        if($this->session['user'] == $username)
        {
            throw new InvalidArgumentException('User is already logged in');
        }
    }

    public function addToSession($key, $value)
    {
        $this->session[$key] = $value;
    }
    public function getFromSession($key)
    {
        return $this->session[$key];
    }
} 