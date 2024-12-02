<?php

include '../bdd/Bdd.php';
include '../model/Event.php';

$event = new \model\event([
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "lieu" =>$_POST['lieu'],
    "elements_requis" =>$_POST['elements_requis'],
    "nombre_de_places" =>$_POST['nombre_de_places'],
]);
$event->ajouterUnEvent();