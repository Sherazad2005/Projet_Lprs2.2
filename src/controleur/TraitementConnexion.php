<?php
include '../bdd/Bdd.php';
include '../model/Utilisateur.php';
$user = new Utilisateur([
    "email" =>$_POST['email'],
    "mdp" =>$_POST['mdp'],
]);
$user->connexion();
