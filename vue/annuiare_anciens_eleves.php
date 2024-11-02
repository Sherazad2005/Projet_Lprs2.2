<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur`');
$req->execute();
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

{
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
    <title>Annuaire des anciens eleves</title>
</head>
<body>

<div class="search-container">
    <form action="//127.0.0.1:8000">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Submit</button>
    </form>
</div><br>

<table>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Mail</th>
        <th>Classe</th>
        <th>Promotion</th>
        <th>CV</th>
    </tr>

    <?php
    foreach ($res as $utilisateur){
    ?>
    <tr>
        <td><?=$utilisateur["nom"] ?></td>
        <td><?=$utilisateur["prenom"] ?></td>
        <td><?=$utilisateur["email"] ?></td>
        <td><?=$utilisateur["classe"] ?></td>
        <td><?=$utilisateur["nom_promo"] ?></td>
        <td><?=$utilisateur["cv"] ?></td>
        <td><a href="editer.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Editer</a>
            / <a href="supprimer.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Supprimer</a></td>
    </tr>
    <?php
    }
    ?>
</table>
<br>
<a href="../vue/accueil">Retour</a>
</body>
</html>
