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
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Actor si en objet
    public function insertActor(array $actor)
    {
        $query = $this->pdoService->getPdo()->prepare("INSERT INTO actor(first_name, last_name) VALUES(:first_name, :last_name)");
        $query->bindParam(':first_name', $actor['firstName']);
        $query->bindParam(':last_name', $actor['firstName']);
        $query->execute();
    }
}