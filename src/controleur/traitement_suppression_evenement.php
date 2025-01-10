<?php

include '../bdd/Bdd.php';
include '../model/Event.php';

$event = new \model\Event([
    "idEvent" =>$_POST['id_event'],
]);

$event->supprimer1();