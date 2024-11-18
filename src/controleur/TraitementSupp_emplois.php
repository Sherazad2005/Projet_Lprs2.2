<?php

use model\Emplois;

include '../bdd/Bdd.php';
include '../model/Emplois.php';


$emplois = new Emplois([
    "idEmplois" =>$_POST['id_emplois'],
]);

$emplois->supprimer_emplois();