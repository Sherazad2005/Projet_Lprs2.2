<?php

include '../bdd/Bdd.php';
include '../model/Utilisateur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $data = [
        "nom" => htmlspecialchars($_POST["nom"]),
        "prenom" => htmlspecialchars($_POST["prenom"]),
        "email" => htmlspecialchars($_POST["email"]),
        "mdp" => password_hash($_POST["mdp"], PASSWORD_DEFAULT),
        "role" => htmlspecialchars($_POST["role"]),
        "classe" => null,
        "nom_promo" => null,
        "cv" => null,
        "specialite_prof" => null,
        "poste_entreprise" => null,
        "motifInscription" => null,
        "idEntreprise" => null
    ];

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

    } elseif ($_POST["role"] == "partenaire") {
        if (empty($_POST["poste_entreprise"]) || empty($_POST["motif_inscription"]) || empty($_POST['idEntreprise'])) {
            echo "Tous les champs sont obligatoires.";
            exit;
        }
        $data["poste_entreprise"] = htmlspecialchars($_POST["poste_entreprise"]);
        $data["motif_inscription"] = htmlspecialchars($_POST["motif_inscription"]);
        $data["idEntreprise"] = intval($_POST['idEntreprise']);
    }
    $utilisateur = new Utilisateur($data);
    var_dump($utilisateur);
    $utilisateur->inscription();
}
