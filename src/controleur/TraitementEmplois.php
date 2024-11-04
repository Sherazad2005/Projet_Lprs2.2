<?php

include '../bdd/Bdd.php';
include '../model/Emplois.php';

$emplois = new \model\Emplois([
    "titre" =>$_POST['titre'],
    "entreprise" =>$_POST['entreprise'],
    "description" =>$_POST['description'],
]);
$emplois->ajouterUnEmplois($_POST);

