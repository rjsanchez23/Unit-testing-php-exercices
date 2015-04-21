<?php

namespace Mpwar\Auth;

use Mpwar\Auth\Library\UserCredentialsValidator;

class SignUp
{


    private $userCredentialsValidator;

    public function __construct(UserCredentialsValidator $userCredentialsValidator)
    {
        $this->userCredentialsValidator = $userCredentialsValidator;
    }

    public function __invoke($email, $userName, $password)
    {
        $this->userCredentialsValidator->validate($email, $password);

    }

}

