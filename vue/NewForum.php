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
    <CENTER><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>
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
</body>
</html>