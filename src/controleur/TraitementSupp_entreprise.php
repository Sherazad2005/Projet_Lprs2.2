<?php


include '../bdd/Bdd.php';
include '../model/Entreprise.php';


$entreprise = new Entreprise([
    "idEntreprise" =>$_POST['id_entreprise'],
]);

$entreprise->supprimerEntreprise1();