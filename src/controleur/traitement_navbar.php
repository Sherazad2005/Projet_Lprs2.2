<?php
require_once '../model/Utilisateur.php';
session_start();

if (!isset($_SESSION['utilisateur'])) {
    header('Location: ../../vue/page_ouverture.php?erreur=4');
    exit;
}

$navbarutil = $_SESSION['utilisateur'];

$role = $navbarutil['role'];


function afficherNavBar() {

    switch ($role) {
        case 'eleve':
            include 'navbar_eleve.php';
            break;
        case 'partenaire':
            include 'navbar_partenaire.php';
            break;
        case 'alumni':
            include 'navbar_alumni.php';
            break;
        case 'professeur':
            include 'navbar_professeur.php';
            break;
        case 'gestionnaire':
            include 'navbar_gestionnaire.php';
            break;
    }
}
?>
