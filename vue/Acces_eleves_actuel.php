  <?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` ');
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
    <title>Annuaire des anciens eleves</title>
    <h1></h1><br>
    <h2>Accès aux élèves actuel !</h2><br>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<table>
    <tr>
        <th>Id Utilisateur</th>
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
            <td><?=htmlspecialchars($utilisateur["id_utilisateur"]?? '' )?></td>
            <td><?=htmlspecialchars($utilisateur["nom"]?? '') ?></td>
            <td><?=htmlspecialchars($utilisateur["prenom"]?? '') ?></td>
            <td><?=htmlspecialchars($utilisateur["email"]?? '') ?></td>
            <td><?=htmlspecialchars($utilisateur["classe"]?? '') ?></td>
            <td><?=htmlspecialchars($utilisateur["nom_promo"]?? '') ?></td>
            <td><?=htmlspecialchars($utilisateur["cv"]?? '') ?></td>
        </tr>
        <?php
    }
    ?>
    <center><div class="search-box">
        <form action="recherche.php" method="GET">
            <input type="text" name="search" placeholder="Entrez un titre, un lieu..." required>
            <button type="submit"><i class="fas fa-search"></i> Recherche</button>
        </form>
    </div></center> <br>
</table>
<br>
<a href="../vue/accueil">Retour</a>
</body>
</html>
