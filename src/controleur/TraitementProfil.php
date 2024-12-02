<?php
var_dump($_SESSION);
    $role = $_SESSION['role'];
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
        case $_SESSION['partenaire']:
            header('Location: ../../vue/profil_partenaire.php');
            break;
        default:
            echo "Rôle non reconnu.";
            exit;
}
