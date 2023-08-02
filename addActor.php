<?php

include_once __DIR__ . '/vendor/autoload.php';

use App\Repository\ActorRepository;
use App\Models\Actor;

$actorRepository = new ActorRepository();
$actor = new Actor;


if(isset($_POST['first-name']) && isset($_POST['last-name'])){
  $firstName = $_POST['first-name'];
  $lastName = $_POST['last-name'];

  $actor->setFirstName($firstName);
  $actor->setLastName($lastName);
  $actorRepository->insertActor($actor);

}

header('Location: index.php');
exit();