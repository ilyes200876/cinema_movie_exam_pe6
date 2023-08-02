<?php

namespace App\Repository;

use App\Models\Movie;
use App\Service\PDOService;

class MovieRepository
{
    private PDOService $pdoService;

    public function __construct()
    {
        $this->pdoService = new PDOService;
    }

    //array de Movie si en objet
    public function findAll():array
    {
        $query = $this->pdoService->getPdo()->query("SELECT * from movie");
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    //array de Movie si en objet
    public function findByTitle(string $title):array
    {
        $query = $this->pdoService->getPdo()->prepare('SELECT * from movie Where title LIKE :title');
        $like = '%' . $title . '%';
        $query->bindParam(':title', $like);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    //Movie si en objet
    public function insertMovie(array $movie)
    {
        $query = $this->pdoService->getPdo()->prepare("INSERT INTO movie(title, release_date) VALUES(:title, :date)");
        $query->bindParam(':title', $movie['title']);
        $query->bindParam(':date', $movie['date']);
        $query->execute();
    }
}