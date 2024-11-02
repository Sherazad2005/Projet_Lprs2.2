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

<form action="../src/controller/TraitementIns.php" method="POST" enctype="multipart/form-data">
   <center> <img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>
     <label for="nom"></label>
        <input type="text" name="nom" required placeholder="Nom"><br><br>

    <label for="prenom"></label>
    <input type="text" name="prenom" required placeholder="Prénom"><br><br>

    <label for="email"></label>
    <input type="email" name="email" required placeholder="Email"><br><br>

    <label for="mdp"></label>
    <input type="password" name="mdp" required placeholder="Mots de passe"><br><br>

    <label for="role"></label>
    <select name="role" id="role" onchange="afficherChampsSpecifiques()" required>
        <option value="--Role--">Sélectionner un rôle</option>
        <option value="eleve">Élève</option>
        <option value="professeur">Professeur</option>
        <option value="alumni">Alumni</option>
        <option value="Partenaire">Entreprise</option>
    </select><br><br>


    <div id="eleveFields" style="display:none;">
        <label for="classe"></label>
        <input type="text" name="classe" placeholder="Classe"><br><br>

        <label for="nom_promo"></label>
        <input type="text" name="nom_promo" placeholder="Promo"><br><br>

        <label for="cv">CV (PDF) :</label>
        <input type="file" name="cv" accept=".pdf"><br><br>
    </div>


    <div id="profFields" style="display:none;">
        <label for="specialite_prof"></label>
        <input type="text" name="specialite_prof" placeholder="Spécialité du Professeur"><br><br>
    </div>


    <div id="alumniFields" style="display:none;">
        <label for="nom_promo">Nom de la promo :</label>
        <input type="text" name="nom_promo" placeholder="Promo"><br><br>
    </div>


    <div id="PartenaireFields" style="display:none;">
        <label for="poste_entreprise">Poste dans l'entreprise :</label>
        <input type="text" name="poste_entreprise" placeholder="Poste"><br><br>

        <label for="secteur_activite">Secteur d'activité :</label>
        <input type="text" name="secteur_activite" placeholder="Secteur d'activite"><br><br>
    </div>
    </center>
        <center><button type="submit">S'inscrire</button></center>
</form>

</body>
</html>