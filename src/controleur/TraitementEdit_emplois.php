<?php

use model\Emplois;

include '../bdd/Bdd.php';
include '../model/Emplois.php';

$emplois = new Emplois([
    "idEmplois" =>$_POST['id_emplois'],
    "titre" =>$_POST['titre'],
    "entreprise" =>$_POST['entreprise'],
    "description" =>$_POST['description'],
]);
$emplois->editer_emplois();

