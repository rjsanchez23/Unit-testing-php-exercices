<?php

namespace Mpwar\Auth;


use Mpwar\Library\UserCredentialsValidator;

class SignUp
{


    private $userCredentialsValidator;
    private $userPost;

    public function __construct(UserCredentialsValidator $userCredentialsValidator, UserPost $userPost)
    {
        $this->userCredentialsValidator = $userCredentialsValidator;
        $this->userPost = $userPost;
    }

    public function __invoke($email, $userName, $password)
    {
        $this->userCredentialsValidator->validate($email, $password);

        return $this->userPost->register($email, $userName, $password);
    }

}

