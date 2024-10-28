<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';
<<<<<<< HEAD

$utilisateur = new Utilisateur([
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "mdp" =>$_POST['mdp'],
    "role"=>$_POST['role'],

]);

$utilisateur->inscription();
=======
require_once '../model/Utilisateur.php'; // Inclusion de la classe Utilisateur

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitement des données de base
    $data = [
        "nom" => htmlspecialchars($_POST["nom"]),
        "prenom" => htmlspecialchars($_POST["prenom"]),
        "email" => htmlspecialchars($_POST["email"]),
        "mdp" => password_hash($_POST["mdp"], PASSWORD_DEFAULT),
        "role" => htmlspecialchars($_POST["role"])
    ];

    // Traitement des données spécifiques en fonction du rôle
    if ($_POST["role"] == "eleve") {
        $data["classe"] = htmlspecialchars($_POST["classe"]);
        $data["nom_promo"] = htmlspecialchars($_POST["nom_promo"]);

        if (isset($_FILES["cv"]) && $_FILES["cv"]["error"] == 0) {
            $cvDir = "uploads/cv/";
            if (!is_dir($cvDir)) {
                mkdir($cvDir, 0755, true);
            }
            $cvFile = $cvDir . basename($_FILES["cv"]["name"]);
            if (move_uploaded_file($_FILES["cv"]["tmp_name"], $cvFile)) {
                $data["cv"] = $cvFile;
            }
        }
    } elseif ($_POST["role"] == "professeur") {
        $data["specialite_prof"] = htmlspecialchars($_POST["specialite_prof"]);
    } elseif ($_POST["role"] == "alumni") {
        $data["nom_promo"] = htmlspecialchars($_POST["nom_promo"]);
    } elseif ($_POST["role"] == "entreprise") {
        $data["poste_entreprise"] = htmlspecialchars($_POST["poste_entreprise"]);
        $data["secteur_activite"] = htmlspecialchars($_POST["secteur_activite"]);
    }

    // Création de l'objet Utilisateur et inscription
    $utilisateur = new Utilisateur($data);
    $utilisateur->inscription(); // Appel de la méthode inscription() pour sauvegarder les données
}
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
