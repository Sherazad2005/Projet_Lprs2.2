<?php
include '../src/bdd/Bdd.php';

$ref_utilisateur = $_GET['id_utilisateur'] ?? null;
$ref_event = $_GET['id_event'] ?? null;

if (!$ref_event) {
    die("ID de l'événement manquant.");
}

$bdd = new Bdd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO inscrire (ref_utilisateur, ref_event) VALUES (:ref_utilisateur, :ref_event)'
        );
        $req->execute([
            ':ref_utilisateur' => $ref_utilisateur,
            ':ref_event' => $ref_event,
        ]);

        echo "<p>Votre candidature a été enregistrée avec succès pour l'événement ID : $ref_event !</p>";
        echo '<a href="participation_evenement_alumni.php">Retour à la liste des événements</a>';
        exit;
    } catch (PDOException $e) {
        die("Erreur lors de l'enregistrement de votre candidature : " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de postulation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .confirmation {
            text-align: center;
            margin-top: 50px;
        }
        button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #203586;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="confirmation">
    <h1>Êtes-vous sûr de vouloir participer à cet événement ?</h1>
    <form method="post">
        <button type="submit">Oui, je veux participer</button>
        <a href="participation_evenement_alumni.php">Non, retour</a>
    </form>
</div>
</body>
</html>