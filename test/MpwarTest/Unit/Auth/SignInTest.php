<?php

namespace MpwarTest\Auth;

use InvalidArgumentException,
    Mpwar\Auth\SignIn,
    Mpwar\Auth\Contracts\Database,
    Mpwar\Auth\Contracts\Hasher,
    Mpwar\Auth\SessionCasper,
    Mpwar\Auth\User;

class SignInTest extends \PHPUnit_Framework_TestCase
{
    /** @test */

    public function shouldFailIfUsernameDoesNotExist()
    {
        $database_stub = $this->getMock(Database::class);
        $hasher_stub = $this->getMock(Hasher::class);
        $session_stub = $this->getMock(SessionCasper::class);
        $signIn = new SignIn($database_stub, $hasher_stub, $session_stub);

        $database_stub
            ->expects($this->any())
            ->method('userExist')
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

    public function shouldFailIfEmailDoesNotExist()
    {
        $database_stub = $this->getMock(Database::class);
        $hasher_stub = $this->getMock(Hasher::class);
        $session_stub = $this->getMock(SessionCasper::class);
        $signIn = new SignIn($database_stub, $hasher_stub, $session_stub);

        $database_stub
            ->expects($this->any())
            ->method('userExist')
            ->will($this->throwException(
                new InvalidArgumentException('Non existent user')
            ));

        $this->setExpectedException(
            InvalidArgumentException::class,
            'Non existent user'
        );

        $signIn('monesvol@mpwar','fffuuu');
    }

    /** @test */

    public function shouldSuccessWhenTheHashingServiceWorksCorrectly()
    {
        $actual_result = sha1('TestingS*cks');
        $expected_hashed_password = '728dedceccf7966e2f9465c1aea2068e4378ad95';
        $this->assertEquals($expected_hashed_password,$actual_result, 'If we use sha1 hashing we expect it to work properly' );
    }

    /** @test */

    public function shouldSuccessUserIfLogInCorrectly()
    {
        $database_stub = $this->getMock(Database::class);
        $hasher_stub = $this->getMock(Hasher::class);
        $session_stub = $this->getMock(SessionCasper::class);
        $signIn = new SignIn($database_stub, $hasher_stub, $session_stub);

        $hasher_stub
            ->expects($this->once())
            ->method('hash')
            ->will($this->returnValue('728dedceccf7966e2f9465c1aea2068e4378ad95'));

        $database_stub
            ->expects($this->once())
            ->method('userExist')
            ->will($this->returnValue(
                new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95')
            ));
        $expected_user =  new User('monesvol@mpwar.com', 'monesvol', '728dedceccf7966e2f9465c1aea2068e4378ad95');
        $user = $signIn('monesvol@mpwar.com','testingS*cks' );
        $this->assertEquals($expected_user, $user, "User expected: User { 'email' : 'monesvol@mpwar.com', 'username' : 'monesvol', 'password' : '728dedceccf7966e2f9465c1aea2068e4378ad95' }");
    }

    /** @test */
    public function shouldFailIfUserIsAlreadyLoggedIn()
    {
        $database_stub = $this->getMock(Database::class);
        $hasher_stub = $this->getMock(Hasher::class);
        $session_stub = $this->getMock(SessionCasper::class);

        $session_stub
            ->expects($this->any())
            ->method('isLoggedIn')
            ->will($this->throwException(new InvalidArgumentException('User is already logged in')));

        $this->setExpectedException(InvalidArgumentException::class,'User is already logged in' );

        $signIn = new SignIn($database_stub, $hasher_stub, $session_stub);

        $signIn('monesvol','testingS*cks');


    }

} 