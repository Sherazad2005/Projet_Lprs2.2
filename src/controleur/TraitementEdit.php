<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "idUtilisateur" =>$_POST['id_utilisateur'],
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "mdp" =>$_POST['mdp'],
    "role"
    "classe"
    "nom_promo"
    "cv"
    "specialite_prof"
    "poste_entreprise"
    "secteur_activite"
]);
$utilisateur->edition();