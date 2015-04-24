<?php

namespace Mpwar\Auth\Contracts;

interface SignInInterface
{
    public function execute($username_or_email, $password);
} 