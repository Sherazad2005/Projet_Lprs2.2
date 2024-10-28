<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "mdp" =>$_POST['mdp'],
    "role"=>$_POST['role'],

]);

$utilisateur->inscription();
