<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "indentifiant deja utilisé";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
<form action="../src/controleur/TraitementConnexion.php" method="post">

    <CENTER><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>

    <CENTER><input type="email" name="email" placeholder="Email"/></CENTER>
    <br>

    <CENTER>

        <input type="password" name="mdp" placeholder="mots de passe"/></CENTER>
    <br><br>

    <center><button type="submit">Connexion</button></center>

    <CENTER><a href="Inscription.php">Vous n'avez pas de compte</a></td></CENTER>


</form>

</body>
</html>