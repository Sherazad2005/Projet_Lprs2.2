<?php
include '../model/EntrepriseModel.php';
include '../bdd/Bdd.php';
$EntrepriseModel = new EntrepriseModel([
    "nom" =>$_POST["nom"],
    "adresse" =>$_POST["adresse"],
    "cp" =>$_POST["cp"],
    "email" =>$_POST["email"],
    "gerant" =>$_POST["gerant"]

]);
$EntrepriseModel->ajouterEntreprise();
