<?php


namespace Mpwar\Library;


class UserCredentialsValidator
{

    private $emailValidator;
    private $passwordValidator;

    public function __construct(EmailValidator $emailValidator, PasswordValidator $passwordValidator)
    {

        $this->emailValidator = $emailValidator;
        $this->passwordValidator = $passwordValidator;
    }

    public function validate($email, $password)
    {
        $this->emailValidator->validate($email);
        $this->passwordValidator->validate($password);

    }

}