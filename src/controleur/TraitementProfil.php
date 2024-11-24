<?php
session_start();
var_dump($_SESSION);
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['role'])) {
    header('Location: login.php'); // Rediriger si pas de connexion
    exit;
}

// Récupérer le rôle de l'utilisateur
$role = $_SESSION['role'];

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
?>
