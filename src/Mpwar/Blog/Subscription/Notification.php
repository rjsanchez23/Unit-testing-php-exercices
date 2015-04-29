<?php

namespace Mpwar\Blog\Subscription;

use Mpwar\Blog\ValueObject\Post;

interface Notification
{
    public function addToQueue(Post $post);
    public function notifyNow(Post $post);
}