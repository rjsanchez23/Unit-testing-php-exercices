<?php


namespace MpwarTest\Unit\Auth;


use InvalidArgumentException;
use Mpwar\Library\EmailValidator;



class EmailValidatorTest extends \PHPUnit_Framework_TestCase{

    /** @test */
    public function shouldFailIfMailNotValid()
    {

        $email = 'monesvol@mpwar';
        $signUp = new EmailValidator;


        $this->setExpectedException(
            InvalidArgumentException::class,
            'Invalid email'
        );
        $signUp->validate($email);

    }


}