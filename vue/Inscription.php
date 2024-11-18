<?php
include '../src/bdd/Bdd.php';

$bdd = new Bdd();
$idEntreprise = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT id_entreprise,nom FROM `entreprise`');
    $req->execute();
    $idEntreprise = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des entreprises : " . $e->getMessage();
}
if (array_key_exists("erreur", $_GET)) {
    if ($_GET["erreur"] == 0) {
        echo "Identifiant déjà utilisé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

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
            document.getElementById("eleveFields").style.display = "none";
            document.getElementById("classe").required = false;
            document.getElementById("nomPromo_el").required = false;
            document.getElementById("cv").required = false;

            document.getElementById("profFields").style.display =  "none";
            document.getElementById("specialiteProf").required = false;

            document.getElementById("alumniFields").style.display = "none";
            document.getElementById("nomPromo_al").required = false;

            document.getElementById("partenaireFields").style.display = "none";
            document.getElementById("posteEntreprise").required = false;
            document.getElementById("motifInscription").required = false;
            document.getElementById("idEntreprise").required = false;


            const role = document.getElementById("role").value;
            if(role ==="eleve"){
                document.getElementById("eleveFields").style.display= "block";
                document.getElementById("classe").required = true;
                document.getElementById("nomPromo_el").required = true;
                document.getElementById("cv").required = true;
            }else if(role ==="professeur"){
                document.getElementById("profFields").style.display= "block";
                document.getElementById("specialiteProf").required = true;

            }else if(role ==="alumni"){
                document.getElementById("alumniFields").style.display= "block";
                document.getElementById("nomPromo_al").required = true;
                document.getElementById("secteurActivite").required = true;


            }else if(role ==="partenaire"){
                document.getElementById("partenaireFields").style.display= "block";
                document.getElementById("posteEntreprise").required = true;
                document.getElementById("motifInscription").required = true;
                document.getElementById("idEntreprise").required = true;
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<form action="../src/controleur/TraitementIns.php" method="POST" enctype="multipart/form-data">
    <center><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>

    <label for="nom"></label>
    <input type="text" class="form-control" name="nom" required placeholder="Nom"><br><br>

    <label for="prenom"></label>
    <input type="text" class="form-control" name="prenom" required placeholder="Prénom"><br><br>

    <label for="email"></label>
    <input type="email" class="form-control" name="email" required placeholder="Email"><br><br>

    <label for="mdp"></label>
    <input type="password" class="form-control" name="mdp" required placeholder="Mot de passe"><br><br>

    <label for="role"></label>
    <select name="role" id="role" onchange="afficherChampsSpecifiques()" required>
        <option value="eleve">Élève</option>
        <option value="professeur">Professeur</option>
        <option value="alumni">Alumni</option>
        <option value="partenaire">Partenaire</option>
    </select><br><br>

    <div id="eleveFields" style="display:block;">
        <label for="classe"></label>
        <input type="text" name="classe" id="classe" placeholder="Classe" required><br><br>

        <label for="nomPromo"></label>
        <input type="text"  name="nomPromo_el" id="nomPromo_el" placeholder="Promo" required><br><br>

        <label for="cv">CV (PDF) :</label>
        <input type="file" name="cv" id="cv" accept=".pdf" required><br><br>
    </div>

    <div id="profFields" style="display:none;">
        <label for="specialiteProf"></label>
        <input type="text" name="specialiteProf" id="specialiteProf" placeholder="Spécialité du Professeur"><br><br>
    </div>

    <div id="alumniFields" style="display:none;">
        <label for="nomPromo"></label>
        <input type="text" name="nomPromo_al" id="nomPromo_al" placeholder="Promo"><br>
        <br><input type="text" name="secteur_activite" id="secteur_activite" placeholder="Secteur d'activité"><br><br>
    </div>

    <div id="partenaireFields" style="display:none;">

        <label for="posteEntreprise"></label>
        <input type="text" name="posteEntreprise" id="posteEntreprise" placeholder="Poste" ><br><br>

        <label for="motifInscription"></label>
        <input type="text" name="motifInscription" id="motifInscription" placeholder="Motif d'inscription" ><br><br>

        <div id="selectEntreprise" style="display: block;">
            <label for="entreprise">Sélectionnez l'Entreprise :</label>
            <select name="idEntreprise" id="idEntreprise" >
                <option value="">Choisir une entreprise</option>
                <?php foreach ($idEntreprise as $idEntreprise) { ?>
                    <option value="<?= $idEntreprise['id_entreprise'] ?>"><?= $idEntreprise['nom'] ?></option>
                <?php } ?>
            </select>
        </div>

    </div>

    <center><button type="submit">S'inscrire</button></center>
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
