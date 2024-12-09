<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "idUtilisateur" =>$_POST['id_utilisateur'],
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "email" =>$_POST['email'],
]);
$utilisateur->editer();