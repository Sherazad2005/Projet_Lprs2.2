<?php
session_start();
include '../src/bdd/Bdd.php';

$bdd = new Bdd();

$id_forum = $_GET['id_forum'];
var_dump($id_forum);


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
        <p class="text-start"><?= htmlspecialchars($res["date_messages"] ?? 'Utilisateur inconnu') ?></p>
        <p class="text-start"><?= htmlspecialchars($res["prenom"] ?? 'Utilisateur inconnu') ?></p>
    </div>
    <?php else: ?>
        <h3>Aucun résultat trouvé</h3>
        <p>Aucune donnée n'a été trouvée pour l'ID de forum spécifié.</p>
    <?php endif; ?>
</div>
    <form action="../src/controleur/TraitementReponse.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_forum" value="<?php echo $id_forum; ?>">
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <input type="text" name="message" class="form-control" required placeholder="Votre message">
        </div>
        <button type="submit" name="ins" class="btn btn-primary">Envoyer</button>
    </form>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="A short description." />
<meta name="keywords" content="put, keywords, here" />
<title>PHP-MySQL forum</title>
<link rel="stylesheet" href="style.css" type="text/css">

<body>

<div id="wrapper">
    <div id="menu">
        <a class="item" href="pageaccueil.php">Page_accueil</a><br><br>
        <a class="item" href="NewForum.php">Crée une nouvelle discussion</nouve></a><br><br>
        <div id="content">
        </div>
    </div>
    <table>
        <tr>
            <th>Titre</th>
            <th>Messages</th>
        </tr>
        <?php
        foreach ($res as $forum){
        ?>
            <tr>
                <td><?= htmlspecialchars(trim($forum['titre'] ?? '')) ?></td>
                <td><?= htmlspecialchars(trim($forum['messages'] ?? '')) ?></td>
            </tr>

            <?php
        }
        ?>
    </table>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoYzVrNHz/jnxil2+9EJk52/KnwNs9ktazFfGdvWZd6EGdt" crossorigin="anonymous"></script>

</html>


