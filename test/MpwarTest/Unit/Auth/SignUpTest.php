<?php

namespace MpwarTest\SetUp;


use InvalidArgumentException;
use Mpwar\Auth\Library\PasswordValidator;
use Mpwar\Auth\SignUp;
use PHPUnit_Framework_TestCase;
use Mpwar\Auth\Library\EmailValidator;

final class SignUpTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldFailIfEmailNotValid()
    {
        $emailValidator_stub = $this->getMock(EmailValidator::class);
        $passwordValidator_stub = $this->getMock(PasswordValidator::class);

        $signUp = new SignUp($emailValidator_stub, $passwordValidator_stub);

        $emailValidator_stub
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
        $emailValidator_stub = $this->getMock(EmailValidator::class);
        $passwordValidator_stub = $this->getMock(PasswordValidator::class);

        $signUp = new SignUp($emailValidator_stub, $passwordValidator_stub);

        $passwordValidator_stub
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



}
