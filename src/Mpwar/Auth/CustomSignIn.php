<?php


namespace Mpwar\Auth;


use InvalidArgumentException;
use Mpwar\Auth\Contracts\Database;
use Mpwar\Auth\Contracts\Hasher;
use Mpwar\Auth\Contracts\LogInInterface;
use Mpwar\Auth\Contracts\SignInInterface;
use Mpwar\ExternalService\UserDb;

class CustomeSignIn implements SignInInterface
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

    public function execute($email_or_username, $password)
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