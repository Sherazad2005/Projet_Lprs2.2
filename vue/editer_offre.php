<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `offres` WHERE id_offre=:id_offre');
$req->execute(array(
    "id_offre" =>$_GET["id_offre"] ?? 0
));

$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition offre</title>
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
<form action="../src/controleur/TraitementEdit_offre.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br>

    <h2 class="mt-3">Edition offres</h2></center>

    <label for="titre"></label>
    <input class="form-control" type="text" name="titre" placeholder="titre" value="<?= htmlspecialchars($res['titre'] ?? '') ?>"/>

    <label for="description"></label>
    <input class="form-control" type="text" name="description" placeholder="description" value="<?= htmlspecialchars($res['description'] ?? '') ?>"/>

    <label for="missions"></label>
    <input class="form-control" type="text" name="missions" placeholder="missions" value="<?= htmlspecialchars($res['missions'] ?? '') ?>"/>

    <label for="type"></label>
    <input class="form-control" type="text" name="type" placeholder="type" value="<?= htmlspecialchars($res['type'] ?? '') ?>"/>

    <label for="salaire"></label>
    <input class="form-control" type="text" name="salaire" placeholder="salaire" value="<?= htmlspecialchars($res['salaire'] ?? '') ?>"/>

    <label for="visibilite"></label>
    <input class="form-control" type="text" name="visibilite" placeholder="visibilite" value="<?= htmlspecialchars($res['visibilite'] ?? '') ?>"/>

    <label for="etat"></label>
    <input class="form-control" type="text" name="etat" placeholder="etat" value="<?= htmlspecialchars($res['etat'] ?? '') ?>"/>

    <label for="id_offre"></label>
    <input class="form-control" type="hidden" name="id_offre" placeholder="id_offre" value="<?= htmlspecialchars($res['id_offre'] ?? '') ?>"/>

    <div class="d-grid gap-2">
        <input type="submit" name="ins" class="btn btn-primary"/><br></div>
</form>
</div>
</body>
</html>