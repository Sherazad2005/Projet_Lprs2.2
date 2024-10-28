<?php
include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nom'])) {
        $nom = new Nom([
            "nom" => $_POST['nom'],
        ]);
        $nom->supprimer();

        header("Location: ../../vue/accueil.php?success");
        exit();
    } else {
        header("Location: ../../vue/supprimer.php?erreur=0&nom={$_POST['nom']}");
        exit();
    }
} else {
    header("Location: ../../vue/accueil.php");
    exit();
}
?>
