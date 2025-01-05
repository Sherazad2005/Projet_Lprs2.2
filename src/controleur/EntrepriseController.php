<?php
include '../model/EntrepriseModel.php';
include '../bdd/Bdd.php';

$EntrepriseModel = new EntrepriseModel([
    "nom" =>$_POST["nom"],
    "adresse" =>$_POST["adresse"],
    "cp" =>$_POST["cp"],
    "adresseWeb" =>$_POST["adresseWeb"],
    "gerant" =>$_POST["gerant"]

]);
$EntrepriseModel->ajouterEntreprise();
