<?php


namespace Mpwar\Unit\Posts;


use Mpwar\Blog\DataBase\PostRepository;
use Mpwar\Blog\Exception\HeaderTooLong;
use Mpwar\Blog\Exception\PublishingError;
use Mpwar\Blog\Posts;
use Mpwar\Blog\Validation\TitleValidation;
use Mpwar\Blog\ValueObject\Post;

class PostTests extends \PHPUnit_Framework_TestCase{

    /** @test */
    public function shouldSuccessIfReturnsAPost(){

        $titleValidator_stab = $this->getMock(TitleValidation::class);
        $postRepository_stab = $this->getMock(PostRepository::class,[]);
        $posts = new Posts($titleValidator_stab, $postRepository_stab);
        $post = $posts->createNew('headline', 'body', true);

        $espectedValue = new Post( 'headline', 'body' );
        $this->assertEquals($espectedValue, $post, "The test should success if the value resturned is a Post");



    }
    /** @test */
    public function shouldSuccessIfTitleIsLongerThan50Chars(){

        $titleValidator_stab = $this->getMock(TitleValidation::class,["validate"]);
        $postRepository_stab = $this->getMock(PostRepository::class);
        $posts = new Posts($titleValidator_stab, $postRepository_stab);
        $titleValidator_stab
            ->method('validate')
            ->will(
                $this->throwException(
                    new HeaderTooLong('Header too long')
                )
            );

        $this->setExpectedException(
            HeaderTooLong::class,
            'Header too long'
        );

        $posts->createNew('headline', 'body', false);


    }

    public function shouldSuccessIfPostNotPersisted(){

        $titleValidator_stab = $this->getMock(TitleValidation::class);
        $postRepository_stab = $this->getMock(PostRepository::class,["insert"]);
        $posts = new Posts($titleValidator_stab, $postRepository_stab);
        $postRepository_stab
            ->expects($this->once())
            ->method('insert')
            ->will(
                $this->throwException(
                    new PublishingError('Post not persisted error')
                )
            );

        $this->setExpectedException(
            PublishingError::class,
            'Post not persisted error'
        );

        $posts->createNew('headline', 'body', false);


    }
}