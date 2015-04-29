<?php


namespace Mpwar\Unit\Posts;


use Mpwar\Blog\Exception\HeaderTooLong;
use Mpwar\Blog\Posts;
use Mpwar\Blog\Validation\TitleValidator;

class PostTests extends \PHPUnit_Framework_TestCase{

    /** @test */
    public function shouldFailIfTitleIsLongerThan50Chars(){

        $titleValidator_stab = $this->getMock(TitleValidator::class,["validate"]);
        $posts = new Posts($titleValidator_stab);
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
}