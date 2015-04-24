<?php

namespace Mpwar\Auth\Contracts;

interface Hasher {
    public function hash($password);
} 