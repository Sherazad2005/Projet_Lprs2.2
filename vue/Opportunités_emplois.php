<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `emplois` ');
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
</head>
<body>


<table>
    <tr>
        <th>Id_emplois</th>
        <th>Titre</th>
        <th>Entreprise</th>
        <th>Description</th>
    </tr>
    <?php
    foreach ($res as $emplois){
        ?>
        <tr>
            <td><?=htmlspecialchars($emplois["id_emplois"]?? '') ?></td>
            <td><?=htmlspecialchars($emplois["titre"] ??'') ?></td>
            <td><?=htmlspecialchars($emplois["entreprise"]?? '')?></td>
            <td><?=htmlspecialchars($emplois["descritpion"]?? '')?></td>

            <td><a href="editer.php?id_emplois=<?=$emplois["id_emplois"]?>">Editer</a>
                <a href="supprimer.php?id_emplois=<?=$emplois["id_emplois"]?>">Supprimer</a>
                <a href="postuler.php?id_emplois=<?=$emplois["id_emplois"]?>">Postuler</a>
            </td>
        </tr>

        <?php
    }
    ?>
</table>
<a href="../vue/accueil">Retour</a>
</body>
</html>