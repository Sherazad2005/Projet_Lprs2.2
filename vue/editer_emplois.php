<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `emplois` WHERE id_emplois=:id_emplois');
$req->execute(array(
    "id_emplois" =>$_GET["id_emplois"] ?? 0
));

$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition d'un profil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {

        margin: 0 auto;
        width: 500px;

        padding: 1em;
        border: 1px solid #ccc;
        border-radius: 1em;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    form li + li {
        margin-top: 1em;
    }

    label {

        display: inline-block;
        width: 90px;
        text-align: right;
    }
</style>
<body>
<form action="../src/controleur/TraitementEdit_emplois.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <center><input type="text" name="titre" placeholder="titre" value="<?= htmlspecialchars($res['titre'] ?? '') ?>"/><br><br>
        <input type="text" name="entreprise" placeholder="entreprise" value="<?= htmlspecialchars($res['entreprise'] ?? '') ?>"/><br><br>
        <input type="text" name="description" placeholder="description" value="<?= htmlspecialchars($res['description'] ?? '') ?>"/>
    </center><input type="hidden" name="id_emplois" placeholder="id_emplois" value="<?= htmlspecialchars($res['id_emplois'] ?? '') ?>"/><br><br>
        <center><input type="submit" name="ins"/><br></center>


</form>

</body>
</html>