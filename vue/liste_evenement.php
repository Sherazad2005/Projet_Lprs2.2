<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Event.php';
session_start();


$bdd = new Bdd();

$event = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT * FROM event');
    $req->execute();
    $event = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des événements : " . $e->getMessage();
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
        #overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; }
    </style>

    <script>
        function afficherEditionForm(id) {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("header").classList.add("blurred");
            const form = document.getElementById("editionForm");
            form.style.display = "block";
            document.getElementById("overlay").style.display = "block";
            form.querySelector("input[name='id_event']").value = id;
        }

        function afficherSuppressionForm(id) {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("header").classList.add("blurred");
            const form = document.getElementById("suppressionForm");
            form.style.display = "block";
            document.getElementById("overlay").style.display = "block";
            form.querySelector("input[name='id_event']").value = id;
        }

        function fermerFormulaire(id) {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById("header").classList.remove("blurred");
            document.getElementById(id).style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }

    </script>
</head>

<body>
<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div id="notification" class="alert alert-success text-center" role="alert">
        Utilisateur modifier avec succesz.
    </div>
<?php endif; ?>
<header id="header">
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

<div id="content" class="container mt-5">
    <h1>Liste des événements</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Lieu</th>
            <th>Elements requis</th>
            <th>Nombres de places</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($event as $row): ?>
            <tr>
                <td><?= $row['id_event'] ?></td>
                <td><?= $row['titre'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['lieu'] ?></td>
                <td><?= $row['elementsrequis'] ?></td>
                <td><?= $row['nombreplaces'] ?></td>
                <td>
                    <button class="btn btn-dark me-3" onclick="afficherEditionForm(<?= $row['id_event'] ?>)">Editer</button>
                    <button class="btn btn-dark me-3" onclick="afficherSuppressionForm(<?= $row['id_event'] ?>)">Supprimer</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="editionForm" class="form-container">
    <form action="../src/controleur/traitementeven.php" method="POST">
        <h2>Édition d'utilisateur</h2>
        <input type="hidden" name="id_event">
        <input type="text" class="form-control" name="titre" placeholder="Titre" required>
        <input type="text" class="form-control" name="description" placeholder="Description" required>
        <input type="text" class="form-control" name="lieu" placeholder="Lieu" required>
        <input type="text" class="form-control" name="elementsrequis" placeholder="Elements requis" required>
        <input type="text" class="form-control" name="nombreplaces" placeholder="Nombres de places" required>
        <div>
            <button type="submit" class="btn btn-dark">Modifier</button>
            <button type="button" class="btn btn-secondary" onclick="fermerFormulaire('editionForm')">Fermer</button>
        </div>
    </form>
</div>

<div id="suppressionForm" class="form-container">
    <form action="../src/controleur/traitement_suppression_evenement.php" method="POST"">
        <h2>Voulez-vous supprimer cet événement ?</h2>
        <input type="hidden" name="id_event">

        <button type="submit" class="btn btn-dark">Supprimer</button>
        <button type="button" class="btn btn-secondary" onclick="fermerFormulaire('suppressionForm')">Annuler</button>
    </form>
</div>

<footer class="text-center mt-5">
    <p>2024 Projet LPRS.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>
