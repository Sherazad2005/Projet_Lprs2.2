<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `offres` ');
$req->execute(array());
$res = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire des anciens eleves</title>
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
        <h1 class="text-primary">Offres</h1>
    </div>
    <center><form action="../src/controleur/recherche_offre.php" method="GET">
            <label for="titre">Titre de l'offre :</label>
            <input type="text" id="titre" name="titre" placeholder="Entrez le titre" required>
            <button type="submit">Rechercher</button>
        </form></center><br>
    <div class="table-container p-4">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
        <th>Id</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Missions</th>
        <th>Type</th>
        <th>Salaire</th>
        <th>Visibilite</th>
        <th>Etat</th>
        <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $offres): ?>
            <tr>
            <td><?=htmlspecialchars($offres["id_offre"]?? '' )?></td>
            <td><?=htmlspecialchars($offres["titre"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["description"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["missions"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["type"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["salaire"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["visibilite"]?? '') ?></td>
            <td><?=htmlspecialchars($offres["etat"]?? '') ?></td>
            <td>
                <a href="editer_offre.php?id_offre=<?=$offres["id_offre"]?>" class="edit-btn">Editer</a>
                <a href="supprimer_offre.php?id_offre=<?=$offres["id_offre"]?>"class="delete-btn">Supprimer</a></td>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="text-center mt-4">
        <a href="../src/controleur/TraitementDeco.php" class="btn btn-outline-danger">Déconnexion</a>
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