<?php

use model\event;

include '../bdd/Bdd.php';
include '../model/Evenement.php';

$event = new event([
    "idEvent" =>$_POST['id_event'],
    "nom" =>$_POST['nom'],
    "date" =>$_POST['date'],
    "inscrits" =>$_POST['inscrits'],
    "gerant" =>$_POST['gerant'],
]);
$event->editer_event();