<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "email" =>$_POST['email'],
    "mdp" =>$_POST['mdp'],
]);
$utilisateur->connexion();

