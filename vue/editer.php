<?php
include '../src/bdd/Bdd.php';

$bdd = new bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE id_utilisateur=:id_utilisateur');
$req->execute(array(
    "id_utilisateur" =>$_GET["id_utilisateur"] ?? 0
));
$res = $req->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Edition d'un profil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .form-container {
        background: #fff;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }
    .form-container h2 {
        margin-bottom: 1.5rem;
    }
    .hidden {
        display: none;
    }
</style>
<body>
<div class="form-container">
<form action="../src/controleur/TraitementEdit.php" method="post">
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br>
    <h2 class="mt-3">Edition profil</h2></center>
    <label for="nom"></label>
    <input class="form-control" type="text" name="nom" placeholder="nom" value="<?= htmlspecialchars($res['nom'] ?? '') ?>"/>
    <label for="prenom"></label>
    <input class="form-control" type="text" name="prenom" placeholder="prenom" value="<?= htmlspecialchars($res['prenom'] ?? '') ?>"/>
    <label for="mdp"></label>
    <input class="form-control" type="password" name="mdp" placeholder="mdp" value="<?= htmlspecialchars($res['mdp'] ?? '') ?>"/>
    <label for="id_utilisateur"></label>
    <input class="form-control" type="hidden" name="id_utilisateur" placeholder="id_utilisateur" value="<?= htmlspecialchars($res['id_utilisateur'] ?? '') ?>"/>

        <label for="role">Sélectionner un rôle</label>
        <select class="form-control" name="role" id="role" onchange="afficherChampsSpecifiques()">
            <option value="eleve">Élève</option>
            <option value="professeur">Professeur</option>
            <option value="alumni">Alumni</option>
            <option value="partenaire">Partenaire</option>
        </select>

        <div id="eleveFields" style="display:none;">
            <label for="classe">Classe :</label>
            <input type="text" name="classe" placeholder="classe" value="<?= htmlspecialchars(trim($res['classe'] ?? '')) ?>">

            <label for="nom_promo">Nom de la promo :</label>
            <input type="text" name="nom_promo" placeholder="nom_promo" value="<?= htmlspecialchars(trim($res['nom_promo'] ?? '')) ?>">

            <label for="cv">CV (PDF) :</label>
            <input type="file" name="cv" accept=".pdf">
        </div>

        <div id="profFields" style="display:none;">
            <label for="specialite_prof">Spécialité du Professeur :</label>
            <input type="text" name="specialite_prof" placeholder="Spécialité du Professeur" value="<?= htmlspecialchars(trim($res['specialite_prof'] ?? '')) ?>">
        </div>

        <div id="alumniFields" style="display:none;">
            <label for="nom_promo">Nom de la promo :</label>
            <input type="text" name="nom_promo" placeholder="Promo" value="<?= htmlspecialchars(trim($res['nom_promo'] ?? '')) ?>">
        </div>

        <div id="entrepriseFields" style="display:none;">
            <label for="poste_entreprise">Poste dans l'entreprise :</label>
            <input type="text" name="poste_entreprise" placeholder="Poste" value="<?= htmlspecialchars(trim($res['poste_entreprise'] ?? '')) ?>">

            <label for="secteur_activite">Secteur d'activité :</label>
            <input type="text" name="secteur_activite" placeholder="Secteur d'activité" value="<?= htmlspecialchars(trim($res['secteur_activite'] ?? '')) ?>">
        </div>
    <br>


    <div class="d-grid gap-2">
        <input type="submit" name="ins" class="btn btn-primary"/><br></div>
    </center>
</form>
</div>
</body>
</html>


