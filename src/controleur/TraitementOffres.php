<?php

use model\Offres;

include '../bdd/Bdd.php';
include '../model/Offres.php';

$offres = new Offres([
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "missions" =>$_POST['missions'],
    "type" =>$_POST['type'],
    "salaire" =>$_POST['salaire'],
    "visibilite" =>$_POST['visibilite'],
    "etat" =>$_POST['etat'],
]);
$offres->ajouterOffre();