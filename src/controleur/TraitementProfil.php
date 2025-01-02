<?php
require_once '../model/Utilisateur.php';
session_start();


if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../../vue/page_ouverture.php?erreur=4'); // Redirige si non connecté
    exit;
}


$utilisateur = $_SESSION['utilisateur'];

$role = $utilisateur['role'];



    switch ($role) {
        case 'eleve':
            header('Location: ../../vue/profil_eleve.php');
            exit;
        case 'partenaire':
            header('Location: ../../vue/profil_partenaire.php');
            exit;
        case 'alumni':
            header('Location: ../../vue/profil_alumni.php');
            exit;
        case 'professeur':
            header('Location: ../../vue/profil_professeur.php');
            exit;
        default:
            header('Location: ../../vue/page_ouverture.php?erreur=5'); // Rôle non reconnu
            exit;
    }
