<?php


use model\Event;

include '../bdd/Bdd.php';
include '../model/Event.php';

$event = new event([
    "idEvent" =>$_POST['id_event'],
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "lieu" =>$_POST['lieu'],
    "elementsrequis" =>$_POST['elementsrequis'],
    "nombreplaces" =>$_POST['nombreplaces'],
]);
$event->editer_event();