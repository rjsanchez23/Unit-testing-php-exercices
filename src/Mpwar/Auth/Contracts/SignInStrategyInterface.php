<?php

namespace Mpwar\Auth\Contracts;

interface SignInStrategyInterface
{
    public function signIn($username_or_email, $password);
} 