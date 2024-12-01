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
    <title>Edition d'un profil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
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
<form action="../src/controleur/TraitementEdit_offre.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <center><input type="text" name="titre" placeholder="titre" value="<?= htmlspecialchars($res['titre'] ?? '') ?>"/><br><br>
        <input type="text" name="description" placeholder="description" value="<?= htmlspecialchars($res['description'] ?? '') ?>"/><br><br>
        <input type="text" name="missions" placeholder="missions" value="<?= htmlspecialchars($res['missions'] ?? '') ?>"/><br><br>
        <input type="text" name="type" placeholder="type" value="<?= htmlspecialchars($res['type'] ?? '') ?>"/><br><br>
        <input type="text" name="salaire" placeholder="salaire" value="<?= htmlspecialchars($res['salaire'] ?? '') ?>"/><br><br>
        <input type="text" name="visibilite" placeholder="visibilite" value="<?= htmlspecialchars($res['visibilite'] ?? '') ?>"/><br><br>
        <input type="text" name="etat" placeholder="etat" value="<?= htmlspecialchars($res['etat'] ?? '') ?>"/><br><br>
    </center><input type="hidden" name="id_offre" placeholder="id_offre" value="<?= htmlspecialchars($res['id_offre'] ?? '') ?>"/><br><br>
    <center><input type="submit" name="ins"/><br></center>


</form>
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
</body>
</html>