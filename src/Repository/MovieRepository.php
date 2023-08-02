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
        return $query->fetchAll(\PDO::FETCH_CLASS, Movie::class);
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
    public function insertMovie(Movie $movie): Movie
    {
        $query = $this->pdoService->getPdo()->prepare("INSERT INTO movie(title, release_date) VALUES(:title, :date)");
        $movie = new Movie();
        $title = $movie->getTitle();
        $releaseDate = $movie->getReleaseDate()->format('Y-m-d');
        $query->bindParam(':title', $title);
        $query->bindParam(':date', $releaseDate);
        $query->execute();
        return $movie;
    }
}