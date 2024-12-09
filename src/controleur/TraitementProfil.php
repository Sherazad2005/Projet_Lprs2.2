<?php
require_once '../model/Utilisateur.php';
session_start();
    $role = $_SESSION['utilisateur']->getRole();
    if ($role == 'eleve') {
        header('Location: ../../vue/profil_eleve.php');
    }

if ($role == 'partenaire') {
    header('Location: ../../vue/profil_partenaire.php');
}

if ($role == 'alumni') {
    header('Location: ../../vue/profil_alumni.php');
}

if ($role == 'professeur') {
    header('Location: ../../vue/profil_professeur.php');
}