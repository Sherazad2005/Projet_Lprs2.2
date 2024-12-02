<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "id_utilisateur" =>$_POST['id_utilisateur'],
]);

$utilisateur->supprimer();
