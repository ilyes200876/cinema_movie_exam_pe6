<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\ActorRepository;

$actorRepository = new ActorRepository();


if(isset($_POST['first-name']) && isset($_POST['last-name'])){
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];
  $actorRepository->insertActor([
    'firstName' => $firstName,
    'lastName' => $lastName
  ]);

}

header('Location: index.php');
exit();