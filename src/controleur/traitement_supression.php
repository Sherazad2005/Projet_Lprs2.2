<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "idUtilisateur" =>$_POST['id_utilisateur'],
]);

$utilisateur->supprimer();