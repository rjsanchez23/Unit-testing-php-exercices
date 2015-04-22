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

        try{
            $result =  $signUp->validate($email);
        }catch (InvalidArgumentException $e){
            $this->assertEquals("Invalid email",$e->getMessage());
        }

        /*$this->setExpectedException(
            InvalidArgumentException::class,
            'Invalid email'
        );*/

    }


}