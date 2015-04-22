<?php


namespace Mpwar\Library;


class PasswordHasher {

    public function hash($password){
        return sha1($password);
    }
}