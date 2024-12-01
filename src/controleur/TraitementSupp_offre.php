<?php


include '../bdd/Bdd.php';
include '../model/Offres.php';


$event = new \model\Offres([
    "idOffre" =>$_POST['id_offre'],
]);

$event->supprimer_offre();