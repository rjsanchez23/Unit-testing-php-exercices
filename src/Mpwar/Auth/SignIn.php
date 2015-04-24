<?php

namespace Mpwar\Auth;


use Mpwar\Auth\Contracts\SignInInterface;

final class SignIn
{
    private $database;


    public function __construct(SignInInterface $database)
    {
        $this->database = $database;

    }

    public function __invoke($email_or_username, $password)
    {
        $user = $this->database->execute($email_or_username, $password);

        return $user;
    }



}