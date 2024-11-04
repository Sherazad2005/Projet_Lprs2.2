<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "emplois deja inscrit";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emplois</title>
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

<form action="../src/controleur/TraitementEmplois.php" method="POST" enctype="multipart/form-data">
    <center><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <CENTER> <input type="text" name="titre" placeholder="titre"/><br></CENTER><br>
    <CENTER>  <input type="text" name="entreprise" placeholder="entreprise"/><br></CENTER><br>
    <CENTER>  <input type="text" name="description" placeholder="description"/><br></CENTER><br>

    <center><button type="submit">Valider</button></center>

</form>

</body>
</html>