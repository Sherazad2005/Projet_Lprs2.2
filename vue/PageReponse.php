<?php
session_start();
include '../src/bdd/Bdd.php';

$bdd = new Bdd();


$id_forum = $_GET['id_forum'] ?? 0;
if (!is_numeric($id_forum)) {
    $id_forum = 0;
}

$req = $bdd->getBdd()->prepare(
    'SELECT * FROM forum as f
     LEFT JOIN reponse as r ON f.id_Forum = r.ref_Forum
     LEFT JOIN utilisateur as u ON f.ref_utilisateur = u.id_utilisateur
     WHERE f.id_Forum = :id_Forum'
);
$req->execute(array(
    'id_Forum' => $id_forum,
));

$res = $req->fetch();

if (isset($_SESSION['id_utilisateur'])) {
    echo "Utilisateur connecté : " . htmlspecialchars($_SESSION['username']);
} else {
    echo "Aucun utilisateur connecté.";
}
?>

<!DOCTYPE html>
<html lang="fr">
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
        }
    </style>
</head>

<div class="forum-container">
    <div class="question-card">
    <?php if ($res): ?>
        <h3><?= htmlspecialchars($res["titre"] ?? 'Titre non disponible') ?></h3>
        <p class="text-start"><?= htmlspecialchars($res["messages"] ?? 'Pas de message disponible') ?></p>
        <p class="text-start"><?= htmlspecialchars($res["nom"] ?? 'Utilisateur inconnu') ?></p>
    </div>
    <?php else: ?>
        <h3>Aucun résultat trouvé</h3>
        <p>Aucune donnée n'a été trouvée pour l'ID de forum spécifié.</p>
    <?php endif; ?>

    <form action="../src/controleur/TraitementReponse.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="messages" class="form-label">Message</label>
            <input type="text" name="messages" class="form-control" required placeholder="Votre message">
        </div>
        <button type="submit" name="ins" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYzVrNHz/jnxil2+9EJk52/KnwNs9ktazFfGdvWZd6EGdt" crossorigin="anonymous"></script>
</body>
</html>


