<?php
require_once '../src/model/Utilisateur.php';
session_start();

// Inclure la définition de la classe Utilisateur avant tout accès à $_SESSION

if (!class_exists('Utilisateur')) {
    die('Erreur : la classe Utilisateur n\'a pas été chargée.');
}

if (!isset($_SESSION["utilisateur"])) {
    header("Location: ../../vue/page_ouverture.php?erreur=4");
    exit;
}

// Récupération de l'utilisateur stocké en session
$utilisateur = $_SESSION["utilisateur"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
    <style>

        form input, form select, form label, form button {
            width: 100%;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 2rem;
            color: #302b2b;
            font-family: 'Arial Black';
            font-weight: bold;
        }

        .blurred {
            filter: blur(5px);
            transition: filter 0.3s ease;
        }


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


        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
    <script>

        function afficherFormulaireDeconnexion() {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("overlay").style.display = "block";
            document.getElementById("deconnexionForm").style.display = "block";
        }


        function fermerFormulaireDeconnexion() {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById("overlay").style.display = "none";
            document.getElementById("deconnexionForm").style.display = "none";
        }
    </script>
</head>
<body>
<?php if (isset($_GET['erreur']) && $_GET['erreur'] == 1): ?>
    <div id="notification" class="alert alert-danger text-center" role="alert">
        Email ou Mot de Passe Incorrect.
    </div>
<?php endif; ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                    src="../assets/img/logoLprs.png"
                    class="img-fluid rounded"
                    style="height: 50px; width: auto; object-fit: contain;"
                    alt="LPRS"
                    loading="lazy"
                />
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="pageacceuil.php" role="button">Accueil</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="AnnuaireEleve.php" role="button">Annuaire</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="PageForumAlumniEntreprise.php" role="button">Forum</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="Offres.php" role="button">Offres</a></li>
            </ul>

            <a class="btn btn-primary mx-2" href="#" onclick="afficherFormulaireDeconnexion()">Déconnection</a>
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

        <div id="deconnexionForm">
            <h2>Voulez-vous vous déconnecter ?</h2>
            <div class="mt-3">

                <form action="page_ouverture.php" method="GET">
                    <button type="submit" class="btn btn-dark">Se déconnecter</button>
                </form>

                <button class="btn btn-secondary mt-2" onclick="fermerFormulaireDeconnexion()">Annuler</button>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <h2 class="text-center">Profil Gestionnaire</h2>
    <div class="card">
        <div class="card-header">
            <h4><?php echo htmlspecialchars($utilisateur->getprenom() . ' ' . $utilisateur->getnom()); ?></h4>
        </div>
        <div class="card-body">
            <p><strong>Email :</strong> <?php echo htmlspecialchars($utilisateur->getEmail()); ?></p>
        </div>

        <div class="card-footer text-center">
            <a href="gestionnaire.php" class="btn btn-danger">Déconnexion</a>
        </div>
    </div>
</div>


</div><footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <section class="py-4">
        <div class="container text-center">
            <p> 2024 Projet LPRS.</p>
        </div>
    </section>
</footer>
</body>
