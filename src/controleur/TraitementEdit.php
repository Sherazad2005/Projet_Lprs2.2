<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$utilisateur = new Utilisateur([
    "id_utilisateur" =>$_POST['id_utilisateur'],
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "mdp" =>$_POST['mdp'],
    "role" =>$_POST['role'],
    "classe" =>$_POST['classe'],
    "nom_promo" =>$_POST['nom_promo'],
    "cv"=>$_POST['cv'],
    "specialite_prof"=>$_POST['specialite_prof'],
    "poste_entreprise"=>$_POST['poste_entreprise'],
    "secteur_activite"=>$_POST['secteur_activite'],
]);
$utilisateur->editer();