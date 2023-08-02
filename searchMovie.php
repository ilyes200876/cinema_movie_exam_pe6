<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\MovieRepository;

$movieRepository = new MovieRepository();


if(isset($_POST['title-search'])){
  $title = $_POST['title-search'];
  $movies = $movieRepository->findByTitle($title);


  echo 'Voici la liste des films que vous recherchier : ' . '<br>';

  foreach($movies as $movie){
    echo '- ' . $movie['title'] . '<br>';
  }
}
