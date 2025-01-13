<?php
include '../src/bdd/Bdd.php';
session_start();
//if ($_SESSION['role'] !== 'admin') {
    //die("Accès refusé.");
//}

$bdd = new Bdd();

$entreprises = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT id_entreprise, nom FROM entreprise');
    $req->execute();
    $entreprises = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des entreprises : " . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">

    <style>
        form input, form select, form label, form button { width: 100%; margin-bottom: 1rem; }

        .blurred { filter: blur(5px); transition: filter 0.3s ease; }

        .form-container { display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 1000; width: 400px; }

        #eleveFields, #profFields, #alumniFields, #partenaireFields { display: none; }

        #overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; }

        #deconnexionForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            width: 300px;
            text-align: center;
        }


    </style>

    <script>

        function afficherChampsSpecifiques() {
            const role = document.getElementById("role").value;
            document.getElementById("eleveFields").style.display = (role === "eleve") ? "block" : "none";
            document.getElementById("profFields").style.display = (role === "professeur") ? "block" : "none";
            document.getElementById("alumniFields").style.display = (role === "alumni") ? "block" : "none";
            document.getElementById("partenaireFields").style.display = (role === "partenaire") ? "block" : "none";
        }

        function afficherFormulaire(id) {
            document.getElementById("content").classList.add("blurred");
            document.getElementById(id).style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function fermerFormulaire(id) {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById(id).style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                        src="../assets/img/logoLprs.png"
                        class="img-fluid rounded"
                        style="height: 50px; object-fit: contain;"
                        alt="LPRS"
                        loading="lazy"
                />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-primary mx-2" href="pageacceuil.php">Accueil</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" href="AnnuaireEleve.php">Annuaire</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" href="PageForumAlumniEntreprise.php">Forum</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" href="offres.php">Offres</a></li>
            </ul>
            <button class="btn btn-dark me-3" onclick="afficherFormulaire('deconnexionForm')">Déconnexion</button>
        </div>
    </nav>
</header>

<div id="content" class="container mt-5">

    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">

            <a class="btn btn-dark btn-lg mb-3 mx-4" href="liste_utilisateur.php" style="width: 200px; height: 60px;">
                Liste/Modifications Utilisateurs
            </a>

            <button class="btn btn-dark btn-lg mb-3 mx-4" style="width: 200px; height: 60px;" onclick="afficherFormulaire('creationForm')">
                Creation Utilisateurs
            </button>

            <a class="btn btn-dark btn-lg mb-3 mx-4" href="page_validation.php" style="width: 200px; height: 60px;">
                Validation Utilisateurs
            </a>

            <a class="btn btn-dark btn-lg mb-3 mx-4" href="liste_evenement.php" style="width: 200px; height: 60px;">
                Liste Evenements
            </a>

            <a class="btn btn-dark btn-lg mb-3 mx-4" href="liste_entreprise.php" style="width: 200px; height: 60px;">
                Liste Entreprise
            </a>

            <a class="btn btn-dark btn-lg mb-3 mx-4" href="Messages.php" style="width: 200px; height: 60px;">
                Messages des utilisateurs
            </a>
        </div>
    </div>
</div>




<div id="creationForm" class="form-container">
    <form action="../src/controleur/TraitementIns.php" method="POST" enctype="multipart/form-data">
        <h2>Création Utilisateur</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="nom" required placeholder="Nom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="prenom" required placeholder="Prénom">
        </div>
        <div class="form-group">
            <input type="email"
                   class="form-control"
                   name="email"
                   required
                   placeholder="Email"
                   pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(fr|com)$"
                   title="L'email doit se terminer par .fr ou .com">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="mdp" required placeholder="Mot de Passe">
        </div>
        <div class="form-group">
            <select name="role" id="role" class="form-control" onchange="afficherChampsSpecifiques()" required>
                <option value="eleve">Élève</option>
                <option value="professeur">Professeur</option>
                <option value="alumni">Alumni</option>
                <option value="partenaire">Partenaire</option>
                <option value="gestionnaire">Gestionnaire</option>
            </select>
        </div>

        <div id="eleveFields">
            <div class="form-group">
                <input type="text" name="classe" class="form-control" placeholder="Classe">
            </div>
            <div class="form-group">
                <input type="text" name="nomPromo_el" class="form-control" placeholder="Promo">
            </div>
            <div class="form-group">
                <input type="file" name="cv" class="form-control" accept=".pdf">
            </div>
        </div>

        <div id="profFields">
            <div class="form-group">
                <input type="text" name="specialiteProf" class="form-control" placeholder="Spécialité">
            </div>
        </div>

        <div id="alumniFields">
            <div class="form-group">
                <input type="text" name="secteur_activite" class="form-control" placeholder="Secteur d'activité">
            </div>
            <div class="form-group">
                <select name="id_entreprise" class="form-control">
                    <option value="">Sélectionner une entreprise</option>
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= htmlspecialchars($entreprise['id_entreprise']) ?>">
                            <?= htmlspecialchars($entreprise['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div id="partenaireFields">
            <div class="form-group">
                <input type="text" name="poste_entreprise" class="form-control" placeholder="Poste">
            </div>
            <div class="form-group">
                <input type="text" name="motif_inscription" class="form-control" placeholder="Motif d'inscription">
            </div>
            <div class="form-group">
                <select name="id_entreprise" class="form-control">
                    <option value="">Sélectionner une entreprise</option>
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= htmlspecialchars($entreprise['id_entreprise']) ?>">
                            <?= htmlspecialchars($entreprise['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark">S'inscrire</button>
            <button type="button" class="btn btn-secondary" onclick="fermerFormulaire()">Fermer</button>
        </div>
    </form>
</div>


<div id="deconnexionForm" class="form-container">
    <h2>Voulez-vous vous déconnecter ?</h2>
    <form action="page_ouverture.php" method="GET">
        <button type="submit" class="btn btn-dark">Se déconnecter</button>
    </form>
    <button class="btn btn-secondary" onclick="fermerFormulaire('deconnexionForm')">Annuler</button>
</div>


<div id="overlay"></div>


<footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <section class="py-4">
        <div class="container text-center">
            <p>2024 Projet LPRS.</p>
        </div>
    </section>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>
