<?php
session_start();
var_dump($_SESSION);
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['role'])) {
    header('../vue/pageacceuil.php?erreur=1'); // Rediriger si pas de connexion
    exit;
}else{
    // Récupérer le rôle de l'utilisateur
    $role = $_SESSION['utilisateur']['utilisateur_role'];
    var_dump($role);
// Redirection en fonction du rôle
    switch ($role) {
        case 'eleve':
            header('Location: profil_eleve.php');
            break;
        case 'professeur':
            header('Location: profil_professeur.php');
            break;
        case 'alumni':
            header('Location: profil_alumni.php');
            break;
        case 'partenaire':
            header('Location: profil_partenaire.php');
            break;
        default:
            echo "Rôle non reconnu.";
            exit;
    }
}
