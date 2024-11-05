<?php
require_once '../src/model/Utilisateur.php';

$utilisateurData = [
    'id_utilisateur' => 1,
    'nom' => 'Jean Dupont',
    'email' => 'jean.dupont@example.com',
    'photo' => 'https://via.placeholder.com/150'
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
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Toggle button -->
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

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar brand -->
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
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Projects</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <a class="link-secondary me-3" href="#">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <!-- Notifications -->
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
                        <a class="dropdown-item" href="#">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Settings</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->
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
        <a href="../../vue/accueilid.php" class="btn btn-secondary">Retour</a>
    </div>
</div>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->

        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
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
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
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
