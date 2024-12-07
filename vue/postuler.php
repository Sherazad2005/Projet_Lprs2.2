<?php
include '../src/bdd/Bdd.php';
include '../src/model/Utilisateur.php';


$ref_emplois = $_GET['id_emplois'] ?? null;
$ref_utilisateur = $_GET['id_utilisateur'] ?? null;

if (!$ref_emplois) {
    die("ID de l'emploi manquant.");
}

if (!$ref_utilisateur) {
    die("ID de l'utilisateur manquant.");
}
$bdd = new Bdd();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO postuler (ref_utilisateur, ref_emplois) VALUES (:ref_utilisateur, :ref_emplois)'
        );
        $req->execute([
            ':ref_emplois' => $ref_emplois,
            ':ref_utilisateur' => $ref_emplois,
        ]);

        echo "<p>Votre candidature a été enregistrée avec succès pour l'emploi ID : $ref_emplois !</p>";
        echo "<p>Votre candidature a été enregistrée avec succès pour l'emploi ID : $ref_utilisateur !</p>";
        echo '<a href="Opportunités_emplois_alumni.php">Retour à la liste des emplois</a>';
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Forum - Réponses</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .forum-container {
            margin: 2rem auto;
            max-width: 800px;
        }
        .question-card {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .response-card {
            background: #ffffff;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .response-card .author {
            font-weight: bold;
            color: #007bff;
        }
        .response-card .timestamp {
            font-size: 0.9rem;
            color: #6c757d;
        }
        .response-form textarea {
            resize: none;

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


<div class="forum-container">
    <!-- Question Section -->
    <div class="question-card">
        <h3>Comment apprendre à coder en Python ?</h3>
        <p>Je suis débutant et j'aimerais savoir par où commencer pour apprendre Python. Des conseils ?</p>
        <p class="text-muted">Posté par <strong>JohnDoe</strong> le 25 novembre 2024</p>
    </div>

    <!-- Responses Section -->
    <div class="responses">
        <h4>Réponses (3)</h4>

        <!-- Response 1 -->
        <div class="response-card">
            <p class="author">Alice</p>
            <p>C’est une excellente question ! Je recommande de commencer avec des tutoriels comme Codecademy ou de suivre des cours sur Udemy. Pratiquez beaucoup en essayant de créer des petits projets.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 10:00</p>
        </div>

        <!-- Response 2 -->
        <div class="response-card">
            <p class="author">Bob</p>
            <p>Vous devriez également lire la documentation officielle de Python et rejoindre des forums comme Stack Overflow ou Reddit pour poser vos questions.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 10:30</p>
        </div>

        <!-- Response 3 -->
        <div class="response-card">
            <p class="author">Charlie</p>
            <p>Python est très accessible ! Essayez d'installer Anaconda si vous voulez un environnement simple pour débuter avec Python et des bibliothèques comme NumPy ou pandas.</p>
            <p class="timestamp">Répondu le 25 novembre 2024 à 11:00</p>
        </div>
    </div>

    <!-- Add a Response Form -->
    <div class="response-form mt-4">
        <h4>Ajouter une réponse</h4>
        <form action="submit_response.php" method="POST">
            <div class="mb-3">
                <label for="response-text" class="form-label">Votre réponse</label>
                <textarea class="form-control" id="response-text" name="response" rows="4" placeholder="Rédigez votre réponse ici..." required></textarea>
            </div>
            <div class="mb-3">
                <label for="author-name" class="form-label">Votre nom</label>
                <input type="text" class="form-control" id="author-name" name="author" placeholder="Entrez votre nom" required>
            </div>
            <button type="submit" class="btn btn-primary">Publier</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="confirmation">
    <h1>Êtes-vous sûr de vouloir postuler pour cet emploi ?</h1>
    <form method="post">
        <button type="submit">Oui, je postule</button>
        <a href="Opportunités_emplois_alumni.php">Non, retour</a>
    </form>
</div>

</body>
</html>
