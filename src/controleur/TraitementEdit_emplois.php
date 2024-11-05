<?php

include '../bdd/Bdd.php';
include '../model/Emplois.php';

$emplois = new \model\Emplois([
    "idEmplois" =>$_POST['id_emplois'] ?? 0,
    "titre" =>$_POST['titre'] ?? '',
    "entreprise" =>$_POST['entreprise'] ?? '',
    "description" =>$_POST['description'] ?? '',
]);
$emplois->editer();

