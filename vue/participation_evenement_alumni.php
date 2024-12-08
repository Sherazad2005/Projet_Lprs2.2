<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `event` ');
$req->execute(array());
$res = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Participation des événements</title>
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
            .edit-btn, .delete-btn, .post-btn:hover {
                text-decoration: none;
                margin: 0 5px;
            }
            .edit-btn:hover, .delete-btn:hover, .post-btn:hover {
                text-decoration: underline;
            }
            .edit-btn {
                color: #0d6efd;
            }
            .delete-btn {
                color: #dc3545;
            }

            .post-btn{
                color: #efd005;
            }
        </style>
</head>
<body>
<div class="container">
    <div class="text-center py-5">
        <h1 class="text-primary">Participation des événements</h1>
    </div>
    <div class="table-container p-4">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
            <tr>
        <th>Id_event</th>
        <th>titre</th>
        <th>description</th>
        <th>lieu</th>
        <th>elementsrrequis</th>
        <th>nombreplaces</th>
        <th>actions</th>
    </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $event): ?>
        <tr>
            <td><?=htmlspecialchars($event["id_event"]?? '') ?></td>
            <td><?=htmlspecialchars($event["titre"] ??'') ?></td>
            <td><?=htmlspecialchars($event["description"]?? '')?></td>
            <td><?=htmlspecialchars($event["lieu"]?? '')?></td>
            <td><?=htmlspecialchars($event["elementsrrequis"]?? '')?></td>
            <td><?=htmlspecialchars($event["nombreplaces"]?? '')?></td>
            <td>
                <a href="editer_event.php?id_event=<?=$event["id_event"]?>" class="edit-btn">Editer</a>
                <a href="supprimer_event.php?id_event=<?=$event["id_event"]?>" class="delete-btn">Supprimer</a>
                <a href="inscrire.php?id_event=<?=$event["id_event"]?>" class="post-btn">S'inscrire</a>
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