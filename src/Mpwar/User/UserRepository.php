<?php


namespace Mpwar\User;


use Mpwar\Contracts\EntityRepository;
use Mpwar\Persist\GhostDatabase;

class UserRepository implements EntityRepository{

    private $database;

    public function __construct(GhostDatabase $database){

        $this->database = $database;
    }
    public function store($entity)
    {
        $this->database->persist($entity);
    }
}