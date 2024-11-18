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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<table>
    <tr>
        <th>id Utilisateur</th>
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

            <td><?=$utilisateur["id_utilisateur"] ?></td>
            <td><?=$utilisateur["nom"] ?></td>
            <td><?=$utilisateur["prenom"]?></td>
            <td><?=$utilisateur["email"]?></td>
            <td><?=$utilisateur["mdp"]?></td>
            <td><?=$utilisateur["nom_promo"]?></td>
            <td><?=$utilisateur["cv"]?></td>
            <td><?=$utilisateur["classe"]?></td>
            <td><?=$utilisateur["role"]?></td>
            <td><a href="editer.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Editer</a>
                / <a href="Supprimer.php?id_utilisateur=<?=$utilisateur["id_utilisateur"]?>">Supprimer</a></td>
        </tr>

        <?php
    }
    ?>
    <a href="../src/controleur/TraitementDeco.php">Deconnexion</a>
</table>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->

    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>
                </div>
</footer>
<!-- Footer -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>