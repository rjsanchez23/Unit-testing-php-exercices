<?php

namespace Mpwar\Blog\ValueObject;

final class Post
{
    private $headline;
    private $body;

    public function __construct($a_headline, $a_body)
    {
        $this->headline = $a_headline;
        $this->body     = $a_body;
    }
}