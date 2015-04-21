<?php

namespace Mpwar\Auth;

use Mpwar\Auth\Library\EmailValidator;


class SignUp
{
    private $emailValidator;


    public function __construct(EmailValidator $emailValidator){

        $this->emailValidator = $emailValidator;

    }

    public function __invoke($email, $userName, $password)
    {
        $this->emailValidator->validate($email);

    }

}

