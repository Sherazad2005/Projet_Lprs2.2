<?php
include '../src/bdd/Bdd.php';

$ref_utilisateur = $_GET['id_utilisateur'] ?? null;
$ref_emplois = $_GET['id_emplois'] ?? null;


if (!$ref_emplois) {
    die("ID de l'emploi manquant.");
}

$bdd = new Bdd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO postuler (ref_utilisateur, ref_emplois) VALUES (:ref_utilisateur, :ref_emplois)'
        );
        $req->execute([
            ':ref_utilisateur' => $ref_utilisateur,
            ':ref_emplois' => $ref_emplois,
        ]);

        echo "<p>Votre candidature a été enregistrée avec succès pour l'emploi ID : $ref_emplois !</p>";
        echo '<a href="Opportunités_emplois_prof.php">Retour à la liste des emplois</a>';
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
    <h1>Êtes-vous sûr de vouloir postuler pour cet emploi ?</h1>
    <form method="post">
        <button type="submit">Oui, je postule</button>
        <a href="Opportunités_emplois_prof.php">Non, retour</a>
    </form>
</div>

</body>
</html>