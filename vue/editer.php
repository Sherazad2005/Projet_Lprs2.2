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
        width: 500px;

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
    <center> <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <center><input type="text" name="nom" placeholder="nom" value="<?= htmlspecialchars($res['nom'] ?? '') ?>"/><br><br>
    <input type="text" name="prenom" placeholder="prenom" value="<?= htmlspecialchars($res['prenom'] ?? '') ?>"/><br><br>
    <input type="password" name="mdp" placeholder="mdp" value="<?= htmlspecialchars($res['mdp'] ?? '') ?>"/>
    <input type="hidden" name="id_utilisateur" placeholder="id_utilisateur" value="<?= htmlspecialchars($res['id_utilisateur'] ?? '') ?>"/><br><br>

        <label for="role">Sélectionner un rôle</label>
        <select name="role" id="role" onchange="afficherChampsSpecifiques()">
            <option value="">Sélectionner un rôle</option>
            <option value="eleve">Élève</option>
            <option value="professeur">Professeur</option>
            <option value="alumni">Alumni</option>
            <option value="partenaire">Partenaire</option>
        </select><br><br>

        <div id="eleveFields" style="display:none;">
            <label for="classe">Classe :</label>
            <input type="text" name="classe" placeholder="classe" value="<?= htmlspecialchars(trim($res['classe'] ?? '')) ?>"><br><br>

            <label for="nom_promo">Nom de la promo :</label>
            <input type="text" name="nom_promo" placeholder="nom_promo" value="<?= htmlspecialchars(trim($res['nom_promo'] ?? '')) ?>"><br><br>

            <label for="cv">CV (PDF) :</label>
            <input type="file" name="cv" accept=".pdf"><br><br>
        </div>

        <div id="profFields" style="display:none;">
            <label for="specialite_prof">Spécialité du Professeur :</label>
            <input type="text" name="specialite_prof" placeholder="Spécialité du Professeur" value="<?= htmlspecialchars(trim($res['specialite_prof'] ?? '')) ?>"><br><br>
        </div>

        <div id="alumniFields" style="display:none;">
            <label for="nom_promo">Nom de la promo :</label>
            <input type="text" name="nom_promo" placeholder="Promo" value="<?= htmlspecialchars(trim($res['nom_promo'] ?? '')) ?>"><br><br>
        </div>

        <div id="entrepriseFields" style="display:none;">
            <label for="poste_entreprise">Poste dans l'entreprise :</label>
            <input type="text" name="poste_entreprise" placeholder="Poste" value="<?= htmlspecialchars(trim($res['poste_entreprise'] ?? '')) ?>"><br><br>

            <label for="secteur_activite">Secteur d'activité :</label>
            <input type="text" name="secteur_activite" placeholder="Secteur d'activité" value="<?= htmlspecialchars(trim($res['secteur_activite'] ?? '')) ?>"><br><br>
        </div>


        <center><input type="submit" name="ins"/><br></center>


</form>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->

    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>

                </div>
</footer>
<!-- Footer -->
</body>
</html>