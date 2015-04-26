<?php


namespace Mpwar\Auth\Contracts;


interface Database {

    public function UserExist($email_or_username, $hashed_password);
}