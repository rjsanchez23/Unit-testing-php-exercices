<?php

namespace Mpwar\Auth\Contracts;

interface Database
{
    public function userExist($username_or_email, $password);
} 