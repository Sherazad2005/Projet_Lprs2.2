<?php
if (array_key_exists("erreur",$_GET)){
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0){
        echo "indentifiant deja utilisé";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<style>
    form {
        /* On centre le formulaire */
        margin: 0 auto;
        width: 400px;
        /* Le contour du formulaire */
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
        /* Taille et alignement uniformes */
        display: inline-block;
        width: 90px;
        text-align: right;
    }
</style>
<form action="../src/controleur/TraitementIns.php" method="post">
    <CENTER><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>

    <CENTER> <input type="text" name="nom" placeholder="Nom"/><br></CENTER><br>

    <CENTER> <input type="text" name="prenom" placeholder="Prenom"/><br></CENTER><br>





    <CENTER>  <input type="password" name="mdp" placeholder="Mots de passe"/><br></CENTER><br>



    <BLOCKQUOTE> <label for="fonction-select"></label>
        <select name="fonction" id="fonction-select">
            <option value="">--Fonction--</option>
            <option value="Professeur">Professeur</option>
            <option value="Entreprise">Entreprise</option>
            <option value="Eleve">Eleve</option>
            <option value="Alumni">Alumni</option>
        </select></BLOCKQUOTE><br><br>

    <CENTER> <input type="submit" name="ins"/></CENTER><br>
    <CENTER> <a href="Inscription.php"> Ce connecter </a></td></CENTER>


</form>

</body>
</html>