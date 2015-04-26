<?php

namespace Mpwar\Auth;


use Mpwar\Auth\Contracts\SignInStrategyInterface;

final class SignIn
{
    private $signInService;


    public function __construct(SignInStrategyInterface $signInService)
    {
        $this->signInService = $signInService;

    }

    public function __invoke($email_or_username, $password)
    {
        $user = $this->signInService->signIn($email_or_username, $password);

        return $user;
    }



}