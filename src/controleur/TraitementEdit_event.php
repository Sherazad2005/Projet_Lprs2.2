<?php

use model\event;

include '../bdd/Bdd.php';
include '../model/Evenement.php';

$event = new event([
    "idEvent" =>$_POST['id_event'],
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "lieu" =>$_POST['lieu'],
    "elements_requis" =>$_POST['elements_requis'],
    "nombre_de_places" =>$_POST['nombre_de_places'],
]);
$event->editer_event();