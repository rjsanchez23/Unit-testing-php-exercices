<?php

namespace MpwarTest\Auth;

use InvalidArgumentException,
    Mpwar\Auth\SignIn,
    Mpwar\Auth\User;
use Mpwar\Auth\Contracts\SignInInterface;

class SignInTest extends \PHPUnit_Framework_TestCase
{
    /** @test */

    public function shouldFailIfUsernameOrEmailDoesNotExist()
    {
        $database_stub = $this->getMock(SignInInterface::class);
        $signIn = new SignIn($database_stub);

        $database_stub
            ->expects($this->any())
            ->method('execute')
            ->will($this->throwException(
                new InvalidArgumentException('Non existent user')
            ));

        $this->setExpectedException(
            InvalidArgumentException::class,
            'Non existent user'
        );

        $signIn('mpwar','fffuuu');
    }

    /** @test */

    public function shouldSuccessUserIfLogInCorrectly()
    {
        $database_stub = $this->getMock(SignInInterface::class);
        $signIn = new SignIn($database_stub);

        $database_stub
            ->expects($this->once())
            ->method('execute')
            ->will($this->returnValue(
                new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95')
            ));
        $expected_user =  new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95');
        $user = $signIn('monesvol@mpwar.com','testingS*cks' );
        $this->assertEquals($expected_user, $user, "User expected: User { 'email' : 'monesvol@mpwar.com', 'username' : 'monesvol', 'password' : '728dedceccf7966e2f9465c1aea2068e4378ad95' }");
    }


} 