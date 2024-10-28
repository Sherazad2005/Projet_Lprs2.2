<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE id_utilisateur=:id_utilisateur');
$req->execute(array(
    "id_utilisateur" =>$_GET["id_utilisateur"]
));
$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition d'un profil</title>
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
<form action="../src/controleur/TraitementEdit.php" method="post">
    <center> <img src="../assets/images/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <input type="text" name="nom" placeholder="nom" value="<?=$res["nom"]?>"/>
    <input type="text" name="prenom" placeholder="prenom" value="<?=$res["prenom"]?>"/></p>

    <input type="password" name="mdp" placeholder="mdp" value="<?=$res["mdp"]?>"/>

    <input type="hidden" name="id_utilisateur" value="<?=$res["id_utilisateur"]?>"/><br>
    <input type="submit" name="ins"/><br>

    <label for="role"></label>
    <select name="role" id="role" onchange="afficherChampsSpecifiques()" >
        <option value="--Role--">Sélectionner un rôle</option>
        <option value="<?=$res["eleve"]?>">Élève</option>
        <option value="<?=$res["professeur"]?>">Professeur</option>
        <option value="<?=$res["alumni"]?>">Alumni</option>
        <option value="<?=$res["entreprise"]?>">Entreprise</option>
    </select><br><br>

    <div id="eleveFields" style="display:none;">
        <label for="classe"></label>
        <input type="text" name="classe" placeholder="classe" value="<?=$res["classe"]?>"><br><br>

        <label for="nom_promo"></label>
        <input type="text" name="nom_promo" placeholder="nom_promo" value="<?=$res["nom_promo"]?>"><br><br>

        <label for="cv">CV (PDF) :</label>
        <input type="file" name="cv" accept=".pdf"><br><br>
    </div>

    <div id="profFields" style="display:none;">
        <label for="specialite_prof"></label>
        <input type="text" name="specialite_prof" placeholder="Spécialité du Professeur" value="<?=$res["specialite_prof"]?>"><br><br>
    </div>


    <div id="alumniFields" style="display:none;">
        <label for="nom_promo">Nom de la promo :</label>
        <input type="text" name="nom_promo" placeholder="Promo" value="<?=$res["nom_promo"]?>"><br><br>
    </div>


    <div id="entrepriseFields" style="display:none;">
        <label for="poste_entreprise">Poste dans l'entreprise :</label>
        <input type="text" name="poste_entreprise" placeholder="Poste" value="<?=$res["poste_entreprise"]?>"><br><br>

        <label for="secteur_activite">Secteur d'activité :</label>
        <input type="text" name="secteur_activite" placeholder="Secteur d'activité" value="<?=$res["secteur_activite"]?>"><br><br>
    </div>








</form>

</body>
</html>