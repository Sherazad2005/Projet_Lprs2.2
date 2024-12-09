<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `event` WHERE id_event=:id_event');
$req->execute(array(
    "id_event" =>$_GET["id_event"] ?? 0
));

$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition d'un événement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .form-container {
        background: #fff;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }
    .form-container h2 {
        margin-bottom: 1.5rem;
    }
    .hidden {
        display: none;
    }
</style>
<body>
<div class="form-container">
<form action="../src/controleur/TraitementEdit_event.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <center><h2 class="mt-3">Edition événements</h2></center>
    <center><label for="titre"></label>
        <input class="form-control" type="text" name="titre" placeholder="titre" value="<?= htmlspecialchars($res['titre'] ?? '') ?>"/>

        <label for="description"></label>
        <input class="form-control" type="text" name="description" placeholder="description" value="<?= htmlspecialchars($res['description'] ?? '') ?>"/>

        <label for="lieu"></label>
        <input class="form-control" type="text" name="lieu" placeholder="lieu" value="<?= htmlspecialchars($res['lieu'] ?? '') ?>"/>

        <label for="elementsrequis"></label>
        <input class="form-control" type="text" name="elementsrequis" placeholder="elementsrequis" value="<?= htmlspecialchars($res['elementsrequis'] ?? '') ?>"/>

        <label for="nombreplaces"></label>
        <input class="form-control" type="text" name="nombreplaces" placeholder="nombreplaces" value="<?= htmlspecialchars($res['nombreplaces'] ?? '') ?>"/>


        <label for="id_event"></label>
        <input class="form-control" type="hidden" name="id_event" placeholder="id_event" value="<?= htmlspecialchars($res['id_event'] ?? '') ?>"/></center>

    <center><div class="d-grid gap-2">
            <input type="submit" name="ins" class="btn btn-primary"/><br></div>
    </center>
</form>

</body>
</html>