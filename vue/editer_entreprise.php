<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `entreprise` WHERE id_entreprise=:id_entreprise');
$req->execute(array(
    "id_entreprise" =>$_GET["id_entreprise"] ?? 0
));

$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition l'entreprise</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
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
<form action="../src/controleur/TraitementEdit_entreprise.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <center><h2 class="mt-3">Edition entreprise</h2></center>
    <center><label for="nom"></label>
        <input class="form-control" type="text" name="nom" placeholder="nom" value="<?= htmlspecialchars($res['nom'] ?? '') ?>"/>

        <label for="gerant"></label>
        <input class="form-control" type="text" name="gerant" placeholder="gerant" value="<?= htmlspecialchars($res['gerant'] ?? '') ?>"/>

        <label for="adresse"></label>
        <input class="form-control" type="text" name="adresse" placeholder="adresse" value="<?= htmlspecialchars($res['adresse'] ?? '') ?>"/>

        <label for="cp"></label>
        <input class="form-control" type="text" name="cp" placeholder="cp" value="<?= htmlspecialchars($res['cp'] ?? '') ?>"/>

        <label for="adresseWeb"></label>
        <input class="form-control" type="text" name="adresseWeb" placeholder="adresseWeb" value="<?= htmlspecialchars($res['adresseWeb'] ?? '') ?>"/>


        <label for="id_entreprise"></label>
        <input class="form-control" type="hidden" name="id_entreprise" placeholder="id_entreprise" value="<?= htmlspecialchars($res['id_entreprise'] ?? '') ?>"/></center>

    <center><div class="d-grid gap-2">
            <input type="submit" name="ins" class="btn btn-primary"/><br></div>
    </center>
</form>

</body>
</html>