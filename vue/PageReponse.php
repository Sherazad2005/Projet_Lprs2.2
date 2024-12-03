<?php
session_start();
include '../src/bdd/Bdd.php';

$bdd = new Bdd();

$id_forum = $_GET['id_forum'] ?? null;

if (!$id_forum) {
    die("ID de forum invalide.");
}

$req = $bdd->getBdd()->prepare(
    'SELECT 
        f.titre AS forum_titre, f.messages AS forum_message, f.date_messages AS forum_date, f.heure_messages AS forum_heure, u.prenom AS forum_utilisateur,
        r.message AS reponse_message, r.date_message AS reponse_date, r.heure_message AS reponse_heure, ut.prenom AS reponse_utilisateur
     FROM forum AS f
     LEFT JOIN reponse AS r ON f.id_Forum = r.ref_Forum
     LEFT JOIN utilisateur AS u ON f.ref_utilisateur = u.id_utilisateur
     LEFT JOIN utilisateur AS ut ON r.ref_utilisateur = ut.id_utilisateur
     WHERE f.id_Forum = :id_Forum'
);
$req->execute(['id_Forum' => $id_forum]);


$res = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Réponses</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .forum-container {
            margin: 2rem auto;
            max-width: 800px;
        }
        .question-card, .response-card {
            background: #ffffff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .response-card .author {
            font-weight: bold;
            color: #007bff;
        }
        .response-card .timestamp {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div class="forum-container">

    <?php if (!empty($res)): ?>
        <div class="question-card">
            <h3><?= htmlspecialchars($res[0]["forum_titre"] ?? 'Titre non disponible') ?></h3>
            <p><?= htmlspecialchars($res[0]["forum_message"] ?? 'Pas de message disponible') ?></p>
            <p class="text-muted"> Le <?= htmlspecialchars($res[0]["forum_date"] ?? 'Date inconnue') ?> à <?= htmlspecialchars($res[0]["forum_heure"] ?? 'Heure inconnue') ?> par <?= htmlspecialchars($res[0]["forum_utilisateur"] ?? 'Utilisateur inconnu') ?></p>
        </div>
    <?php else: ?>
        <h3>Aucun forum trouvé</h3>
        <p>Le forum demandé n'existe pas ou aucune donnée n'a été trouvée.</p>
    <?php endif; ?>


    <?php if (!empty($res)): ?>
        <?php foreach ($res as $row): ?>
            <?php if (!empty($row["reponse_message"])): ?>
                <div class="response-card">
                    <h5 class="author"><?= htmlspecialchars($row["reponse_utilisateur"] ?? 'Utilisateur inconnu') ?></h5>
                    <p><?= htmlspecialchars($row["reponse_message"] ?? 'Pas de message disponible') ?></p>
                    <p class="timestamp">Le <?= htmlspecialchars($row["reponse_date"] ?? 'Date inconnue') ?> à <?= htmlspecialchars($row["reponse_heure"] ?? 'Heure inconnue') ?></p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <h3>Aucune réponse trouvée</h3>
        <p>Il n'y a pas encore de réponses pour ce forum.</p>
    <?php endif; ?>

    <form action="../src/controleur/TraitementReponse.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_forum" value="<?= htmlspecialchars($id_forum) ?>">
        <div class="mb-3">
            <label for="message" class="form-label">Votre message</label>
            <textarea name="message" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" name="ins" class="btn btn-primary">Envoyer</button>
    </form>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
