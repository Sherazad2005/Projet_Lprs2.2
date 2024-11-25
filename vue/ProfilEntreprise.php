<?php
require_once '../src/model/Utilisateur.php';
session_start();

$utilisateurData = [
    'id_utilisateur' => $_SESSION['utilisateur']['id_utilisateur'],
    'nom' => $_SESSION['utilisateur']['nom'],
    'prenom' => $_SESSION['utilisateur']['prenom'],
    'email' => $_SESSION['utilisateur']['email'],
    'role' => $_SESSION['utilisateur']['role'],
    'nom_promo' => $_SESSION['utilisateur']['nom_promo'],
    'classe' => $_SESSION['utilisateur']['classe'],
    'specialite_prof' => $_SESSION['utilisateur']['specialite_prof'],
    'poste_entreprise' => $_SESSION['utilisateur']['poste_entreprise'],
    'secteur_activite' => $_SESSION['utilisateur']['secteur_activite'],
    'motif_inscription' => $_SESSION['utilisateur']['motif_inscription'],
    'id_entreprise' => $_SESSION['utilisateur']['id_entreprise']
];

$utilisateur = new Utilisateur($utilisateurData);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profil Utilisateur</title>
    <style>
        #formulaireAjout {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        #formulaireAjout.show {
            display: block;
            opacity: 1;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">

        <div class="container-fluid">

            <button
                    data-mdb-collapse-init
                    class="navbar-toggler"
                    type="button"
                    data-mdb-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
            >
                <i class="fas fa-bars"></i>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img
                            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
                            height="15"
                            alt="MDB Logo"
                            loading="lazy"
                    />
                </a>
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="pageaccueil.php">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AnnuaireEleve.php">Annuaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="PageForumAlumniEntreprise.php">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Offres.php">Offres</a>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown">
                    <a
                            data-mdb-dropdown-init
                            class="link-secondary me-3 dropdown-toggle hidden-arrow"
                            href="#"
                            id="navbarDropdownMenuLink"
                            role="button"
                            aria-expanded="false"
                    >
                        <i class="fas fa-bell"></i>
                        <span class="badge rounded-pill badge-notification bg-danger">1</span>
                    </a>
                    <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdownMenuLink"
                    >
                        <li>
                            <a class="dropdown-item" href="#">Some news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another news</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
                <!-- Avatar -->
                <div class="dropdown">
                    <a
                            data-mdb-dropdown-init
                            class="dropdown-toggle d-flex align-items-center hidden-arrow"
                            href="#"
                            id="navbarDropdownMenuAvatar"
                            role="button"
                            aria-expanded="false"
                    >
                        <img
                                src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                                class="rounded-circle"
                                height="25"
                                alt="Black and White Portrait of a Man"
                                loading="lazy"
                        />
                    </a>
                    <ul
                            class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdownMenuAvatar"
                    >
                        <li>
                            <a class="dropdown-item" href="ProfilEntreprise.php">Mon Profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </nav>

</header>

<div class="container mt-5">
    <h2>Profil Utilisateur</h2>
    <div class="card">
        <div class="card-header text-center">
            <img src="/uploads/istockphoto-1300845620-612x612.jpg" alt="Photo de Profil" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
            <h4><?php echo $utilisateur->getNom(); ?></h4>
            <h4><?php echo $utilisateur->getPrenom(); ?></h4>
        </div>
        <div class="card-body">
            <p><strong>Email : </strong> <a href="mailto:<?php echo $utilisateur->getEmail(); ?>"><?php echo $utilisateur->getEmail(); ?></a></p>
        </div>
        <div class="card-footer text-center">
            <button id="ajouterEntrepriseBtn" class="btn btn-primary">Ajouter une Entreprise</button>
        </div>
    </div>

    <div id="formulaireAjoutEntreprise" class="mt-4 card">
        <div class="card-header">
            <h5>Ajouter une Entreprise</h5>
        </div>
        <div class="card-body">
            <form id="ajoutEntrepriseForm" action="../src/controller/EntrepriseController.php?action=ajouter" method="POST">
                <div class="form-group">
                    <label for="nomEntreprise">Nom de l'Entreprise</label>
                    <input type="text" class="form-control" id="nomEntreprise" name="nom" required>
                </div>
                <div class="form-group">
                    <label for="adresseEntreprise">Adresse</label>
                    <input type="text" class="form-control" id="adresseEntreprise" name="adresse" required>
                </div>
                <div class="form-group">
                    <label for="cpEntreprise">Code Postal</label>
                    <input type="text" class="form-control" id="cpEntreprise" name="cp" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">Email</label>
                    <input type="email" class="form-control" id="emailEntreprise" name="email" required>
                </div>
                <div class="form-group">
                    <label for="gerantEntreprise">Gérant</label>
                    <input type="text" class="form-control" id="gerantEntreprise" name="gerant" required>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
                <button type="button" class="btn btn-secondary" id="annulerBtn">Annuler</button>
            </form>
        </div>
    </div>

    <div id="formulaireAjoutOffre" class="mt-4 card">
        <div class="card-header">
            <h5>Ajouter une Offre</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="nomEntreprise">Titre de l'offre</label>
                    <input type="text" class="form-control" id="nomEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="adresseEntreprise">Description de l’offre</label>
                    <input type="text" class="form-control" id="adresseEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="cpEntreprise">Missions liées</label>
                    <input type="text" class="form-control" id="cpEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">Salaire </label>
                    <input type="email" class="form-control" id="emailEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">Type d’offre</label>
                    <input type="email" class="form-control" id="emailEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">Cible de l’offre</label>
                    <input type="email" class="form-control" id="emailEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">État de l’offre</label>
                    <input type="email" class="form-control" id="emailEntreprise" required>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
                <button type="button" class="btn btn-secondary" id="annulerBtn">Annuler</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="../../vue/pageacceuil.php" class="btn btn-secondary">Retour</a>
    </div>
</div>

<footer class="text-center text-lg-start bg-body-tertiary text-muted">

    <section class="">
        <div class="container text-center text-md-start mt-5">

            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>

                </div>
</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajouterEntrepriseBtn').click(function() {
            $('#formulaireAjout').toggleClass('show');
        });
        $(document).ready(function() {
            $('#ajouterEntrepriseBtn').click(function() {
                $('#formulaireAjout').toggleClass('show');
            });

        $('#annulerBtn').click(function() {
            $('#formulaireAjout').removeClass('show');
        });
    });
</script>
</body>
</html>
