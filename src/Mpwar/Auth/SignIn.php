<?php

namespace Mpwar\Auth;

use InvalidArgumentException,
    Mpwar\Auth\Contracts\Database,
    Mpwar\Auth\Contracts\Hasher;

final class SignIn
{
    private $database;
    private $hasher;
    private $session;

    public function __construct(Database $database, Hasher $hasher, SessionCasper $session)
    {
        $this->database = $database;
        $this->hasher = $hasher;
        $this->session = $session;
    }

    public function __invoke($email_or_username, $password)
    {
        $this->session->isLoggedIn($email_or_username);

        $hashed_password = $this->hasher->hash($password);

        if(!$user = $this->database->userExist($email_or_username, $hashed_password))
        {
            throw new InvalidArgumentException('Non existent user');
        }
        $this->session->addToSession('user',$email_or_username);

        return $user;
    }


} 