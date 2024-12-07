<?php
include '../src/model/Utilisateur.php';
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.lyceerobertschuman.com%2F&psig=AOvVaw1V4azkFzc1RTIFsSnyE7rn&ust=1710580549450000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPDb56H39YQDFQAAAAAdAAAAABAI">
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
    <meta charset="UTF-8">
    <title>participation_evenement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<div class="container">
    <div class="text-center py-5">
        <h1 class="text-primary">Participation Evenement</h1>
    </div>
    <div class="table-container p-4">

<table class="table table-striped table-hover">
    <thead class="table-dark">
    <tr>
        <th>Id_event</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Lieu</th>
        <th>Elements_requis</th>
        <th>Nombre_de_places</th>
    </tr>
    <?php
    foreach ($res as $event){
        ?>
        <tr>
            <td><?=htmlspecialchars($event["id_event"]?? '') ?></td>
            <td><?=htmlspecialchars($event["titre"]??'')?></td>
            <td><?=htmlspecialchars($event["description"]?? '')?></td>
            <td><?=htmlspecialchars($event["lieu"]?? '')?></td>
            <td><?=htmlspecialchars($event["elements_requis"]?? '')?></td>
            <td><?=htmlspecialchars($event["nombre_de_places"]?? '')?></td>

            <td><a href="editer_event.php?id_event=<?=htmlspecialchars($event['id_event'])?>">Editer</a>
                <a href="supprimer_event.php?id_event=<?=htmlspecialchars($event['id_event'])?>">Supprimer</a>
                <a href="inscrire.php?id_event=<?=htmlspecialchars($event['id_event'])?>">S'inscrire</a>
            </td>
        </tr>

        <?php
    }
    ?>
    </thead>
</table>
    </div>
</div>
<div class="text-center mt-4">
    <a href="pageaccueil.php" class="btn btn-outline-danger">Retour</a>
</div>
<br>
<footer class="text-center">
    <h6>Projet LPRS</h6>
    <p class="mb-0">Une initiative du Lycée Robert Schuman.</p>
</footer>
</body>
</html>