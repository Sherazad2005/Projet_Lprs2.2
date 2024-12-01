<?php



include '../bdd/Bdd.php';
include '../model/Offres.php';

$event = new \model\Offres([
    "idOffre" =>$_POST['id_offre'],
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "missions" =>$_POST['missions'],
    "type" =>$_POST['type'],
    "salaire" =>$_POST['salaire'],
    "visibilite" =>$_POST['visibilite'],
    "etat" =>$_POST['etat'],
]);
$event->editer_offre();