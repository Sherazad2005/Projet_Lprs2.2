<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE role = "eleve"');
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
    <title>Annuaire Eleve</title>
</head>
<body>

<table>
    <tr>
        <th>id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Mots de passe</th>
        <th>Nom promo</th>
        <th>CV</th>
        <th>Classe</th>
        <th>Role</th>
    </tr>
    <?php
    foreach ($res as $utilisateur){
        ?>
        <tr>
            <td><?=$utilisateur["idutilisateur"] ?></td>
            <td><?=$utilisateur["nom"] ?></td>
            <td><?=$utilisateur["prenom"]?></td>
            <td><?=$utilisateur["email"]?></td>
            <td><?=$utilisateur["mdp"]?></td>
            <td><?=$utilisateur["nom_promo"]?></td>
            <td><?=$utilisateur["cv"]?></td>
            <td><?=$utilisateur["classe"]?></td>
            <td><?=$utilisateur["role"]?></td>
            <td><a href="edition.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Editer</a>
                / <a href="supprimer.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Supprimer</a></td>
        </tr>

        <?php
    }
    ?>
    <a href="../src/controller/TraitementDeco.php">Deconnexion</a>
</table>
</body>
</html>