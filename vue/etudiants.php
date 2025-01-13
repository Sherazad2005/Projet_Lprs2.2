<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Utilisateur.php';
session_start();

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "événements deja inscrit";
    }
}

function ListeEvent($bdd) {
    $req = $bdd->getBdd()->prepare("SELECT * FROM event");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

$bdd = new Bdd();
$listeevent = ListeEvent($bdd);
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
            color: #000000;
            font-family: 'Arial';
            font-weight: bolder;
        }

        h2 {
            font-weight: bolder;
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
            document.getElementById("overlay").style.display = "block";
            document.getElementById("deconnexionForm").style.display = "block";
        }

        function fermerFormulaireDeconnexion() {
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
<?php if (isset($_GET['succes']) && $_GET['succes'] == 1): ?>
    <div id="notification" class="alert alert-success text-center" role="alert">
        Entreprise ajouter avec succes.
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
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="annuiare_anciens_eleves.php" role="button">Annuaire</a></li>
                <li class="nav-item dropdown">
                    <a class="btn btn-primary dropdown-toggle mx-2" id="forumDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Forum
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="forumDropdown">
                        <li><a class="dropdown-item" href="PageForumGenerale.php">Forum Général</a></li>
                        <li><a class="dropdown-item" href="PageForumEleve.php">Forum Eleve</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="Opportunités_emplois.php" role="button">Offres</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" data-mdb-ripple-init href="participation_evenement.php" role="button">Evénements</a></li>
                <li class="nav-item"><a class="btn btn-primary mx-2" href="Contact.php">Contact</a></li>
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
                <form action="../src/controleur/traitement_deco.php" method="GET">
                    <button type="submit" class="btn btn-dark">Se déconnecter</button>
                </form>
                <button class="btn btn-secondary mt-2" onclick="fermerFormulaireDeconnexion()">Annuler</button>
            </div>
        </div>
    </nav>
</header>



<!-- Section "Alumni et Etudiants" -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h1 class="section-title">Événements Importants</h1>
            <?php if (!empty($listeevent)): ?>
                <ul class="list-unstyled">
                    <?php foreach ($listeevent as $evenement): ?>
                        <li class="mb-3">
                            <strong><?= htmlspecialchars($evenement['Titre']) ?></strong><br>
                            <?= htmlspecialchars($evenement['Description']) ?><br>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Aucun événement à venir pour le moment.</p>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-center">
            <img src="../assets/img/service-communaute.jpg" alt="Mountain" class="img-fluid rounded shadow" style="max-height: 300px;">
        </div>
    </div>
</div>

<!-- Section "Entreprises Partenaires" -->
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h1>Entreprises Partenaires</h1>
            <p class="lead">
            <h2>Description</h2>
            Le lycée privé Robert Schuman, fondé en 1920, propose des formations professionnelles et technologiques adaptées au monde moderne. Il accueille environ 450 élèves dans un cadre éducatif exigeant.

            <h2>Mission</h2>
            Former des élèves sur le plan académique, professionnel et humain en valorisant des qualités comme la rigueur, l’assiduité, et le respect, tout en favorisant des liens avec le monde professionnel.

            <h2>Vision</h2>
            Devenir un acteur de référence dans la formation technique et industrielle, en connectant élèves, alumni et entreprises pour bâtir un réseau éducatif et professionnel solide.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="../assets/img/dugnylyrschumanadm.jpg" alt="Mountain" class="img-fluid rounded shadow" style="max-height: 300px;">
        </div>
    </div>
</div>
</div>



<footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <section class="py-4">
        <div class="container text-center">
            <p> 2024 Projet LPRS.</p>
        </div>
    </section>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>