<?php


namespace Mpwar\Auth;


use InvalidArgumentException;
use Mpwar\Auth\Contracts\SignInStrategyInterface;
use Mpwar\ExternalService\UserDb;

class ExternalServiceSignIn extends UserDb implements SignInStrategyInterface
{

    public function signIn($email_or_username, $password)
    {

        if (!$user = $this->logIn($email_or_username, $password)) {

            throw new InvalidArgumentException('Non existent user');
        }

        return $this->arrayToUser($user);
    }

    public function arrayToUser(array $user)
    {
        return new User($user["userName"], $user["email"]);
    }
}