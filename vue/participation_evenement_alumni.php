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
    <link rel="icon" type="image/x-icon" href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.lyceerobertschuman.com%2F&psig=AOvVaw1V4azkFzc1RTIFsSnyE7rn&ust=1710580549450000&source=images&cd=vfe&opi=89978449&ved=0CBMQjRxqFwoTCPDb56H39YQDFQAAAAAdAAAAABAI">
    <style>
        * {
            box-sizing: border-box;
        }
        .column {
            float: left;

        }

        .left, .right {
            height: 130px;
            width: 15%;
            border: 1px solid black;
        ;
            padding: 1px;
            text-align: center;
        }

        .middle {
            background-color: #203586;
            height: 180px;
            width: 70%;
            padding: 20px;
            text-align: center;
            font-size: 30px;
            color: black;

        }
        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 3px solid #203586;
        }

        thead th:nth-child(1) {
            width: 30%;
        }

        thead th:nth-child(2) {
            width: 20%;
        }

        thead th:nth-child(3) {
            width: 15%;
        }

        thead th:nth-child(4) {
            width: 35%;
        }

        th,
        td {
            padding: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <title>Opportunités emplois</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>


<table>
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
            <td><?=htmlspecialchars($event["titre"] ??'') ?></td>
            <td><?=htmlspecialchars($event["descritpion"]?? '')?></td>
            <td><?=htmlspecialchars($event["lieu"]?? '')?></td>
            <td><?=htmlspecialchars($event["elements_requis"]?? '')?></td>
            <td><?=htmlspecialchars($event["nombre_de_places"]?? '')?></td>

            <td><a href="editer_event.php?id_event=<?=$event["id_event"]?>">Editer</a>
                <a href="supprimer_event.php?id_event=<?=$event["id_event"]?>">Supprimer</a>
                <a href="postuler.php?id_event=<?=$event["id_event"]?>">Postuler</a>
            </td>
        </tr>

        <?php
    }
    ?>
</table>
<a href="../vue/pageaccueil.php">Retour</a>

<footer class="text-center text-lg-start bg-body-tertiary text-muted">

    <section class="">
        <div class="container text-center text-md-start mt-5">

            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>

                </div>
</footer>
<!-- Footer -->
</body>
</html>