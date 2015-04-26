<?php


namespace MpwarTest\Unit\Auth;


use InvalidArgumentException;
use Mpwar\Library\PasswordValidator;


class PasswordValidatorTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function shouldFailIfPasswordNotValid()
    {

        $password = 'S*cks';
        $passwordValidator = new PasswordValidator();


        $this->setExpectedException(
            InvalidArgumentException::class,
            'Too short password'
        );
        $passwordValidator->validate($password);

    }


}