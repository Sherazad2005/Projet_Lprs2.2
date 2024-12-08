<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "event deja inscrit";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emplois</title>
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
<body>

<form action="../src/controleur/TraitementEvent.php" method="POST" enctype="multipart/form-data">
    <center><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <CENTER> <input type="text" name="titre" placeholder="titre"/><br></CENTER><br>
    <CENTER>  <input type="text" name="description" placeholder="description"/><br></CENTER><br>
    <CENTER>  <input type="text" name="lieu" placeholder="lieu"/><br></CENTER><br>
    <CENTER>  <input type="text" name="elementsrequis" placeholder="elementsrequis"/><br></CENTER><br>
    <CENTER>  <input type="text" name="nombreplaces" placeholder="nombreplaces"/><br></CENTER><br>

    <center><button type="submit">Valider</button></center>

</form>
<footer class="text-center text-lg-start bg-body-tertiary text-muted">

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>

                </div>
</footer>

</body>
</html>