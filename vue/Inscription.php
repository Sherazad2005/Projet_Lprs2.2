<<<<<<< HEAD
<?php
if (array_key_exists("erreur",$_GET)){
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0){
        echo "indentifiant deja utilisé";
    }
}

?>
=======
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
<<<<<<< HEAD
</head>
<body>
<style>

    body{
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
        border: 2px solid #ccc;
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
<form action="../src/controleur/TraitementIns.php" method="post">
    <CENTER><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>

    <CENTER> <input type="text" name="nom" placeholder="Nom"/><br></CENTER><br>

    <CENTER> <input type="text" name="prenom" placeholder="Prenom"/><br></CENTER><br>
    <CENTER>  <input type="password" name="mdp" placeholder="Mots de passe"/><br></CENTER><br>



    <BLOCKQUOTE> <label for="role-select"></label>
        <select name="role" id="fonction-select">
            <option value="">--Role--</option>
            <option value="Professeur">Professeur</option>
            <option value="Entreprise">Entreprise</option>
            <option value="Eleve">Eleve</option>
            <option value="Alumni">Alumni</option>
        </select></BLOCKQUOTE><br><br>

    <CENTER> <input type="submit" name="ins"/></CENTER><br>
    <CENTER> <a href="connexion.php"> Se connecter </a></td></CENTER>


=======
    </head>
    <style>
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

    <script>

        function afficherChampsSpecifiques() {
            const role = document.getElementById("role").value;

            document.getElementById("eleveFields").style.display = (role === "eleve") ? "block" : "none";
            document.getElementById("profFields").style.display = (role === "professeur") ? "block" : "none";
            document.getElementById("alumniFields").style.display = (role === "alumni") ? "block" : "none";
            document.getElementById("entrepriseFields").style.display = (role === "entreprise") ? "block" : "none";
        }
    </script>
</head>
<body>

<form action="../src/controleur/TraitementIns.php" method="POST" enctype="multipart/form-data">
    <CENTER><img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></CENTER>
    <CENTER> <label for="nom"></label>
    <input type="text" name="nom" required placeholder="Nom"><br>

    <label for="prenom"></label>
    <input type="text" name="prenom" required placeholder="Prénom"><br>

    <label for="email"></label>
    <input type="email" name="email" required placeholder="Email"><br>

    <label for="mdp"></label>
    <input type="password" name="mdp" required placeholder="Mots de passe"><br>

    <label for="role"></label>
    <select name="role" id="role" onchange="afficherChampsSpecifiques()" required>
        <option value="--Role--">Sélectionner un rôle</option>
        <option value="eleve">Élève</option>
        <option value="professeur">Professeur</option>
        <option value="alumni">Alumni</option>
        <option value="entreprise">Entreprise</option>
    </select><br>


    <div id="eleveFields" style="display:none;">
        <label for="classe"></label>
        <input type="text" name="classe" placeholder="Classe"><br>

        <label for="nom_promo"></label>
        <input type="text" name="nom_promo" placeholder="Promo"><br>

        <label for="cv">CV (PDF) :</label>
        <input type="file" name="cv" accept=".pdf"><br>
    </div>


    <div id="profFields" style="display:none;">
        <label for="specialite_prof"></label>
        <input type="text" name="specialite_prof" placeholder="Spécialité du Professeur"><br>
    </div>


    <div id="alumniFields" style="display:none;">
        <label for="nom_promo">Nom de la promo :</label>
        <input type="text" name="nom_promo" placeholder="Promo"><br>
    </div>


    <div id="entrepriseFields" style="display:none;">
        <label for="poste_entreprise">Poste dans l'entreprise :</label>
        <input type="text" name="poste_entreprise" placeholder="Poste"><br>

        <label for="secteur_activite">Secteur d'activité :</label>
        <input type="text" name="secteur_activite" placeholder="Secteur d'activité"><br>
    </div>

        <button type="submit">S'inscrire</button></CENTER>
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
</form>

</body>
</html>