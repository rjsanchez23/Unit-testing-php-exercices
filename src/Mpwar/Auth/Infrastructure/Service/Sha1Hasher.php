<?php

namespace Mpwar\Auth\Infrastructure\Service;
use Mpwar\Auth\Contracts\Hasher;

class Sha1Hasher implements Hasher {

    public function hash($password)
    {
        return sha1($password);
    }
} 