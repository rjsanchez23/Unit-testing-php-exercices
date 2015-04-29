<?php


namespace Mpwar\Blog;



use Mpwar\Blog\DataBase\PostRepository;
use Mpwar\Blog\Subscription\Notification;
use Mpwar\Blog\Validation\TitleValidation;
use Mpwar\Blog\ValueObject\Post;

class Posts {

    private $titleValidator;
    private $postRepository;
    private $notification;

    public function __construct(TitleValidation $titleValidator, PostRepository $postRepository, Notification $notification){
        $this->titleValidator = $titleValidator;
        $this->postRepository = $postRepository;
        $this->notification = $notification;
    }
    public function createNew($headline, $body, $instant_publishing){
        $this->titleValidator->validate($headline);
        $post = new Post($headline, $body );
        $this->postRepository->insert($post);
        if($instant_publishing){
            $this->notification->notifyNow($post);
        }

        return $post;


    }

}