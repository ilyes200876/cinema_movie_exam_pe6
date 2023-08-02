<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;
use App\Models\Movie;

$movieRepository = new MovieRepository();
$movie = new Movie();


if(isset($_POST['title']) && isset($_POST['releaseDate'])){
  $title = $_POST['title'];
  $date = $_POST['releaseDate'];
  $movie->setTitle($title);
  $movie->setReleaseDate($date);
  $movieRepository->insertMovie($movie);

}

header('Location: index.php');
exit();