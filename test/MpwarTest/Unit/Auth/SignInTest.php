<?php

namespace MpwarTest\Auth;

use InvalidArgumentException,
    Mpwar\Auth\SignIn,
    Mpwar\Auth\User;
use Mpwar\Auth\Contracts\SignInStrategyInterface;

class SignInTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function shouldFailIfUsernameOrEmailDoesNotExist()
    {
        $signInService_stub = $this->getMock(SignInStrategyInterface::class);
        $signIn = new SignIn($signInService_stub);

        $signInService_stub
            ->expects($this->any())
            ->method('signIn')
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
        $signInService_stub = $this->getMock(SignInStrategyInterface::class);
        $signIn = new SignIn($signInService_stub);

        $signInService_stub
            ->expects($this->once())
            ->method('signIn')
            ->will($this->returnValue(
                new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95')
            ));
        $expected_user =  new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95');
        $user = $signIn('monesvol@mpwar.com','testingS*cks' );
        $this->assertEquals($expected_user, $user, "User expected: User { 'email' : 'monesvol@mpwar.com', 'username' : 'monesvol', 'password' : '728dedceccf7966e2f9465c1aea2068e4378ad95' }");
    }


} 