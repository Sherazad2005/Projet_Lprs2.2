<?php
session_start();
include '../bdd/Bdd.php';
include '../model/Utilisateur.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $data = [
            "nom" => htmlspecialchars($_POST["nom"]),
            "prenom" => htmlspecialchars($_POST["prenom"]),
            "email" => htmlspecialchars($_POST["email"]),
            "mdp" => password_hash($_POST["mdp"], PASSWORD_DEFAULT),
            "role" => htmlspecialchars($_POST["role"]),
            "classe" => null,
            "nomPromo" => null,
            "secteurActivite" => null,
            "cv" => null,
            "specialiteProf" => null,
            "posteEntreprise" => null,
            "motifInscription" => null,
            "idEntreprise" => null
        ];

        if ($_POST["role"] == "eleve") {
            $data["classe"] = htmlspecialchars($_POST["classe"]);
            $data["nomPromo"] = htmlspecialchars($_POST["nomPromo_el"]);

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
            $data["specialiteProf"] = htmlspecialchars($_POST["specialiteProf"]);

        } elseif ($_POST["role"] == "alumni") {
            $data["nomPromo"] = htmlspecialchars($_POST["nomPromo_el"]);
            $data["secteurActivite"] = htmlspecialchars($_POST["secteur_activite"]);
            $data["idEntreprise"] = intval($_POST['id_entreprise']);

        } elseif ($_POST["role"] == "partenaire") {
            $data["posteEntreprise"] = htmlspecialchars($_POST["poste_entreprise"]);
            $data["motifInscription"] = htmlspecialchars($_POST["motif_inscription"]);
            $data["idEntreprise"] = intval($_POST['id_entreprise']);
        }

        $utilisateur = new Utilisateur($data);
        $utilisateur->inscription();



    } catch (Exception $e) {

        $_SESSION['error_message'] = $e->getMessage();
    }
}
