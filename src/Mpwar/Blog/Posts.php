<?php


namespace Mpwar\Blog;


use Mpwar\Blog\Validation\TitleValidator;

class Posts {

    private $titleValidator;

    public function __construct(TitleValidator $titleValidator){
        $this->titleValidator = $titleValidator;
    }
    public function createNew($headline, $body, $instant_publishing){
        $this->titleValidator->validate($headline);
    }

}