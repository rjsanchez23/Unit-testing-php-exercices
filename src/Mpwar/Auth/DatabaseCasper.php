<?php namespace Mpwar\Auth;

use Mpwar\Auth\Contracts\Database;

class DatabaseCasper implements Database
{
    private $users;

    public function __construct()
    {
        $this->users = [
          new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95')
        ];
    }
    public function userExist($username_or_email, $password)
    {
        $user = array_filter($this->users, function($user) use ($username_or_email, $password)
        {
            return (($user->getUsername() == $username_or_email || $user->getEmail() == $username_or_email) &&
                $user->getPassword() == $password);
        });

        return ($user) ? array_shift($user) : $user;
    }
} 