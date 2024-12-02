<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Utilisateur.php';
session_start();

$bdd = new Bdd();

$entreprises = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT * FROM entreprise');
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
                    src="../assets/img/_6b0231d1-ab09-4387-9783-e6f072408b6d.jpg"
                    class="img-fluid rounded"
                    style="height: 50px; object-fit: contain;"
                    alt="LPRS"
                    loading="lazy"
                />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-dark mx-2" href="pageacceuil.php">Accueil</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" href="AnnuaireEleve.php">Annuaire</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" href="PageForumAlumniEntreprise.php">Forum</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" href="Offres.php">Offres</a></li>
            </ul>
            <button class="btn btn-dark me-3" onclick="afficherFormulaire('deconnexionForm')">Déconnexion</button>
            <div class="dropdown">
                <a class="navbar-brand mt-2 mt-lg-0" href="../src/controleur/TraitementProfil.php">
                    <img
                        src="../assets/img/istockphoto-1300845620-612x612.jpg"
                        class="img-fluid rounded"
                        style="height: 50px; width: auto; object-fit: contain;"
                        alt="LPRS"
                        loading="lazy"
                    />
                </a>
            </div>
        </div>
        <div id="overlay"></div>
    </nav>
</header>

<div class="container mt-5">
    <h1>Liste des Entreprise</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID-Entreprise</th>
            <th>Nom</th>
            <th>Gerant</th>
            <th>Adresse</th>
            <th>CP</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($entreprises as $row): ?>
            <tr>
                <td><?= $row['id_entreprise'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['gerant'] ?></td>
                <td><?= $row['adresse'] ?></td>
                <td><?= $row['cp'] ?></td>
                <td><?= $row['email'] ?></td>
                <td>
                    <button class="btn btn-dark me-3" onclick="afficherFormulaire('editionForm')">Editer</button>
                    <button class="btn btn-dark me-3" onclick="afficherFormulaire('suppressionForm')">Supprimer</button>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<div id="deconnexionForm">
    <h2>Voulez-vous vous déconnecter ?</h2>
    <div class="mt-3">

        <form action="page_ouverture.php" method="GET">
            <button type="submit" class="btn btn-dark">Se déconnecter</button>
        </form>

        <button class="btn btn-secondary mt-2" onclick="fermerFormulaireDeconnexion()">Annuler</button>
    </div>
</div>

<div id="suppressionForm" class="form-container">
    <h2>Voulez-vous supprimer cette Entreprise ?</h2>
    <form action="traitement_supression_entreprise.php" method="POST">
        <button type="submit" class="btn btn-dark">Supprimer</button>
        <input type="hidden" name="id_entreprise" value="<?= $row['id_entreprise'] ?>">
    </form>
    <button class="btn btn-secondary" onclick="fermerFormulaire('suppressionForm')">Annuler</button>
</div>

<footer class="text-center mt-5">
    <p>2024 Projet LPRS.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>