<?php

namespace App\Repository;

use App\Service\PDOService;
use App\Models\Actor;

class ActorRepository
{
    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService;
    }

    //array d'Actor si en objet
    public function findAll():array
    {
        $query = $this->pdoService->getPdo()->query("SELECT * from actor");
        return $query->fetchAll(\PDO::FETCH_CLASS, Actor::class);
    }

    //Actor si en objet
    public function insertActor(Actor $actor): Actor
    {
        $actor = new Actor();
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $query = $this->pdoService->getPdo()->prepare("INSERT INTO actor Value(NULL, :first_name, :last_name)");
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->execute();
        return $actor;
    }
}