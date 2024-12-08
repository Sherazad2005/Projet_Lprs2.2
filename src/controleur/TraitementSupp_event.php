<?php

use model\Event;

include '../bdd/Bdd.php';
include '../model/Event.php';


$event = new Event([
    "idEvent" =>$_POST['id_event'],
]);

$event->supprimer_event();