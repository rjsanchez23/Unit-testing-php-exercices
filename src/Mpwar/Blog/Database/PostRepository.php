<?php

namespace Mpwar\Blog\DataBase;

use Mpwar\Blog\ValueObject\Post;

interface PostRepository
{
    public function insert(Post $post);
}