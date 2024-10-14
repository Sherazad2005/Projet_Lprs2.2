<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

$user = new Utilisateur([
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "email" =>$_POST['email'],
    "mdp" =>$_POST['mdp'],
    "nom_promo"=>$_POST['nom_promo'],
    "cv"=>$_POST['cv'],
    "secteur_activite"=>$_POST['secteur_activite'],
    "classe"=>$_POST['classe'],
    "specialite_prof"=>$_POST['specialite_prof'],
    "poste_entreprise"=>$_POST['poste_entreprise'],


]);

$user->inscription();
