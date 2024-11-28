<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "Forum deja soumis";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création Forum</title>
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
        width: 400px;

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
</head>
<body>

<form action="../src/controleur/TraitementForum.php" method="POST" enctype="multipart/form-data">
    <CENTER><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>
     <label for="titre"></label>
        <input type="text" name="titre" required placeholder="titre"><br><br>

        <label for="messages"></label>
        <input type="text" name="messages" required placeholder="messages"><br>

        <BLOCKQUOTE> <label for="canal-select"></label>
            <select name="canal" id="canal-select">
                <option value="">--Canal--</option>
                <option value="generale">Generale</option>
                <option value="entreprise/alumni">Entreprise-Alumni</option>
                <option value="eleve/professeur">Eleve-Professeur</option>
            </select></BLOCKQUOTE><br><br>
    <CENTER> <input type="submit" name="ins"/></CENTER><br>
    <CENTER> <a href="Inscription.php"> Crée </a></td></CENTER>
</form>
//
<footer class="text-center text-lg-start bg-body-tertiary text-muted">

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3">Projet LPRS</i>
                    </h6>

                </div>
</footer>
</body>
</html>