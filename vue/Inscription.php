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
    <title>Inscription</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
    <script>
        function afficherChampsSpecifiqueqs() {
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


            }else if(role ==="partenaire"){
                document.getElementById("partenaireFields").style.display= "block";
                document.getElementById("posteEntreprise").required = true;
                document.getElementById("motifInscription").required = true;
                document.getElementById("idEntreprise").required = true;
            }
        }

    </script>
</head>
<body>
<div class="form-container">

    </head>
<body>

<form action="../src/controleur/TraitementIns.php" method="POST" enctype="multipart/form-data">
    <center><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br>
        <h2 class="mt-3">Inscription</h2>
    <label for="nom"></label>
    <input type="text" class="form-control" name="nom" required placeholder="Nom"><br>

    <label for="prenom"></label>
    <input type="text" class="form-control" name="prenom" required placeholder="Prénom"><br>

    <label for="email"></label>
    <input type="email" class="form-control" name="email" required placeholder="Email"><br>

    <label for="mdp"></label>
    <input type="password" class="form-control" name="mdp" required placeholder="Mot de passe"><br>

    <label for="role" class="form-label"></label>
    <select class="form-control" name="role" id="role" onchange="afficherChampsSpecifiques()" required>
        <option value="eleve">Élève</option>
        <option value="professeur">Professeur</option>
        <option value="alumni">Alumni</option>
        <option value="partenaire">Partenaire</option>
    </select><br><br>

    <div id="eleveFields" style="display:block;">
        <label for="classe"></label>
        <input type="text" name="classe" id="classe" placeholder="Classe" required><br><br>

        <label for="nom_promo"></label>
        <input type="text"  name="nom_promo" id="nomPromo_el" placeholder="Promo" required><br><br>

        <label for="cv">CV (PDF) :</label>
        <input type="file" name="cv" id="cv" accept=".pdf" required><br><br>
    </div>

    <div id="profFields" style="display:none;">
        <label for="specialiteProf"></label>
        <input type="text" name="specialiteProf" id="specialiteProf" placeholder="Spécialité du Professeur"><br><br>
    </div>

    <div id="alumniFields" style="display:none;">
        <label for="nomPromo"></label>
        <input type="text" name="nomPromo_el" id="nomPromo_el" placeholder="Promo"><br><br>
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
        <button type="submit" name="ins" class="btn btn-primary">S'inscrire</button></center>
</div>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
