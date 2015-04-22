<?php


namespace MpwarTest\Unit\Auth;


use Mpwar\Auth\UserPost;
use Mpwar\Library\PasswordHasher;
use Mpwar\User\User;
use Mpwar\User\UserRepository;

class UserPostTest extends \PHPUnit_Framework_TestCase{

    /** @test */
    public function shouldSuccessIfUserPersist()
    {

         $user_stub = new User();
         $userResporitory_stub = $this->getMock(UserRepository::class,["store"],[],"",false);
         $passwordHasher_stub = $this->getMock(PasswordHasher::class,["hash"],[],"",false);

        $userPost = new UserPost($user_stub,$userResporitory_stub,$passwordHasher_stub);



        $passwordHasher_stub
            ->expects($this->any())
            ->method('hash')
            ->will(
                $this->returnValue(
                    "728dedceccf7966e2f9465c1aea2068e4378ad95"
                )
            );

        $user = $userPost->register('monesvol@mpwar.com', 'monesvol', 'S*cks');


        $this->assertEquals(
            new User('monesvol','728dedceccf7966e2f9465c1aea2068e4378ad95','monesvol@mpwar.com'),
            $user,
            'Shoul return a user: User { "email" : "monesvol@mpwar.com", "username" : "monesvol", "password" : "728dedceccf7966e2f9465c1aea2068e4378ad95" }'
        );
    }


}