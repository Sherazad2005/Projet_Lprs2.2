<?php
include '../model/Entreprise.php';
include '../bdd/Bdd.php';

$EntrepriseModel = new Entreprise([
    "nom" =>$_POST["nom"],
    "adresse" =>$_POST["adresse"],
    "cp" =>$_POST["cp"],
    "adresseWeb" =>$_POST["adresseWeb"],
    "gerant" =>$_POST["gerant"]

]);
$EntrepriseModel->ajouterEntreprise();
