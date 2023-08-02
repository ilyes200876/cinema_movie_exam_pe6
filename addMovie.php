<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();


if(isset($_POST['title']) && isset($_POST['releaseDate'])){
  $title = $_POST['title'];
  $date = $_POST['releaseDate'];
  $movieRepository->insertMovie([
    'title' => $title,
    'date' => $date
  ]);

}

header('Location: index.php');
exit();