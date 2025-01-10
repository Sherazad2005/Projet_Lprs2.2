<?php



include '../bdd/Bdd.php';
include '../model/Entreprise.php';

$entreprise = new Entreprise([
    "idEntreprise" =>$_POST['id_entreprise'],
    "nom" =>$_POST['nom'],
    "gerant" =>$_POST['gerant'],
    "adresse" =>$_POST['adresse'],
    "cp" =>$_POST['cp'],
    "adresseWeb" =>$_POST['adresseWeb'],
]);
$entreprise->editerEntreprise1();