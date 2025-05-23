<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE role = "eleve"');
$req->execute();
$res = $req->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire Élève</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            background: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        table {
            margin: 0;
        }
        footer {
            background: #203586;
            color: white;
            padding: 15px 0;
        }
        footer h6 {
            font-size: 1.2rem;
            color: white;
        }
        .edit-btn, .delete-btn {
            text-decoration: none;
            margin: 0 5px;
        }
        .edit-btn:hover, .delete-btn:hover {
            text-decoration: underline;
        }
        .edit-btn {
            color: #0d6efd;
        }
        .delete-btn {
            color: #dc3545;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="text-center py-5">
        <h1 class="text-primary">Annuaire des Élèves</h1>
    </div>
    <center><form action="../src/controleur/recherche.php" method="GET">
            <label for="nom">Nom de l'élève :</label>
            <input type="text" id="nom" name="nom" placeholder="Entrez un nom" required>
            <button type="submit">Rechercher</button>
        </form></center><br>
    <div class="table-container p-4">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de Passe</th>
                <th>Nom Promo</th>
                <th>CV</th>
                <th>Classe</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $utilisateur): ?>
                <tr>
                    <td><?= htmlspecialchars($utilisateur["id_utilisateur"] ?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["nom"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["prenom"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["email"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["mdp"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["nom_promo"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["cv"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["classe"]?? '') ?></td>
                    <td><?= htmlspecialchars($utilisateur["role"]?? '') ?></td>
                    <td>
                        <a href="editer.php?id_utilisateur=<?= $utilisateur["id_utilisateur"] ?>" class="edit-btn">Éditer</a>
                        <a href="Supprimer.php?id_utilisateur=<?= $utilisateur["id_utilisateur"] ?>" class="delete-btn">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
<br>
<footer class="text-center">
    <h6>Projet LPRS</h6>
    <p class="mb-0">Une initiative du Lycée Robert Schuman.</p>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
