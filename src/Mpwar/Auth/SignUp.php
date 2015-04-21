<?php

namespace Mpwar\Auth;

use Mpwar\Auth\Library\EmailValidator;
use Mpwar\Auth\Library\PasswordValidator;

class SignUp
{
    private $emailValidator;
    private $passwordValidator;

    public function __construct(EmailValidator $emailValidator, PasswordValidator $passwordValidator)
    {

        $this->emailValidator = $emailValidator;
        $this->passwordValidator = $passwordValidator;

    }

    public function __invoke($email, $userName, $password)
    {
        $this->emailValidator->validate($email);
        $this->passwordValidator->validate($password);

    }

}

