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
                    <li><a class="dropdown-item" href="PageForumAlumniEntreprise.php">Forum Partenaires</a></li>
                    <li><a class="dropdown-item" href="PageForumAlumniEntreprise.php">Forum Alumni</a></li>
                    <li><a class="dropdown-item" href="PageForumEleve.php">Forum Eleve</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle mx-2" id="forumDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Offres
                </a>
                <ul class="dropdown-menu" aria-labelledby="forumDropdown">
                    <li><a class="dropdown-item" href=Opportunités_emplois.php">Liste des Offres</a></li>
                    <li><a class="dropdown-item" href="offres.php">Ajouter une Offre</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="btn btn-primary dropdown-toggle mx-2" id="forumDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Evenement
                </a>
                <ul class="dropdown-menu" aria-labelledby="forumDropdown">
                    <li><a class="dropdown-item" href=participation_evenement.php">Liste Evenements</a></li>
                    <li><a class="dropdown-item" href="offres.php">Ajouter un Evenement</a></li>
                </ul>
            </li><li class="nav-item"><a class="btn btn-primary mx-2" href="gestion.php">Gestion</a></li>
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