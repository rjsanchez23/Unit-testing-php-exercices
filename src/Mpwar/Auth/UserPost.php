<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 21/04/2015
 * Time: 16:48
 */

namespace Mpwar\Auth;



use Mpwar\Library\PasswordHasher;
use Mpwar\User\User;
use Mpwar\User\UserRepository;

class UserPost {

    private $user;
    private $userRepository;
    private $passwordHasher;

    public function __construct(User $user, UserRepository $userRepository, PasswordHasher $passwordHasher){

        $this->user = $user;
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    public function register($email, $name, $password){

        $password = $this->passwordHasher->hash($password);
        $this->user->name = $name;
        $this->user->password = $password;
        $this->user->email = $email;

        $this->userRepository->store($this->user);
        return $this->user;


    }
}