<?php

namespace MpwarTest\Unit\Auth;


use InvalidArgumentException;
use Mpwar\Auth\SignUp;
use Mpwar\Auth\UserPost;
use Mpwar\Library\UserCredentialsValidator;
use Mpwar\User\User;
use PHPUnit_Framework_TestCase;


final class SignUpTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldFailIfEmailNotValid()
    {

        $userCredentialsValidator_stub = $this->getMock(UserCredentialsValidator::class,["validate"],[],"",false);
        $userPost_stub = $this->getMock(UserPost::class,["register"],[],"",false);
        $signUp = new SignUp($userCredentialsValidator_stub, $userPost_stub);

        $userCredentialsValidator_stub
            ->expects($this->any())
            ->method('validate')
            ->will(
                $this->throwException(
                    new InvalidArgumentException('Invalid email')
                )
            );

        $this->setExpectedException(
            InvalidArgumentException::class,
            'Invalid email'
        );

        $signUp('monesvol@mpwar', 'monesvol', 'TestingS*cks');
    }

    /** @test */
    public function shouldFailIfPasswordNotValid()
    {

        $userCredentialsValidator_stub = $this->getMock(UserCredentialsValidator::class,["validate"],[],"",false);
        $userPost_stub = $this->getMock(UserPost::class,["register"],[],"",false);

        $signUp = new SignUp($userCredentialsValidator_stub, $userPost_stub);

        $userCredentialsValidator_stub
            ->expects($this->any())
            ->method('validate')
            ->will(
                $this->throwException(
                    new InvalidArgumentException('Too short password')
                )
            );

        $this->setExpectedException(
            InvalidArgumentException::class,
            'Too short password'
        );

        $signUp('monesvol@mpwar.com', 'monesvol', 'S*cks');
    }

    /** @test */
    public function shouldSuccessIfGotAUser()
    {

        $userCredentialsValidator_stub = $this->getMock(UserCredentialsValidator::class,["validate"],[],"",false);
        $userPost_stub = $this->getMock(UserPost::class,["register"],[],"",false);
        $signUp = new SignUp($userCredentialsValidator_stub, $userPost_stub);


        $userPost_stub
            ->expects($this->any())
            ->method('register')
            ->will(
                $this->returnValue(
                    new User('monesvol','728dedceccf7966e2f9465c1aea2068e4378ad95','monesvol@mpwar.com')
                )
            );

        $user = $signUp('monesvol@mpwar.com', 'monesvol', 'S*cks');


        $this->assertEquals(
            new User('monesvol','728dedceccf7966e2f9465c1aea2068e4378ad95','monesvol@mpwar.com'),
            $user,
            'Shoul return a user: User { "email" : "monesvol@mpwar.com", "username" : "monesvol", "password" : "728dedceccf7966e2f9465c1aea2068e4378ad95" }'
            );
    }



}
