<?php


namespace Mpwar\Blog;



use Mpwar\Blog\DataBase\PostRepository;
use Mpwar\Blog\Validation\TitleValidation;
use Mpwar\Blog\ValueObject\Post;

class Posts {

    private $titleValidator;
    private $postRepository;

    public function __construct(TitleValidation $titleValidator, PostRepository $postRepository){
        $this->titleValidator = $titleValidator;
        $this->postRepository = $postRepository;
    }
    public function createNew($headline, $body, $instant_publishing){
        $this->titleValidator->validate($headline);
        $post = new Post($headline, $body );
        $this->postRepository->insert($post);
        return $post;


    }

}