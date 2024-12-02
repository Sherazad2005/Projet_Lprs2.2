<?php
session_start();
?>

<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil - Projet LPRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            border-bottom: 2px solid #203586;
        }

        .navbar-brand img {
            width: 40px;
            height: auto;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 15px;
        }

        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }

        section {
            padding: 60px 0;
        }

        footer {
            background-color: #203586;
            color: white;
            padding: 20px;
        }

        footer h6 {
            font-size: 1.2rem;
            font-weight: bold;
        }

        footer p {
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #203586;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1a2c6b;
        }

        .card-body {
            background-color: #f1f5f8;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../assets/img/logoLprs.png" alt="Logo"> Projet LPRS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="Inscription.php">Inscription</a></li>
                        <li><a class="dropdown-item" href="Connexion.php">Connexion</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="forumDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Forums</a>
                    <ul class="dropdown-menu" aria-labelledby="forumDropdown">
                        <li><a class="dropdown-item" href="PageForumGenerale.php">Forum général</a></li>
                        <li><a class="dropdown-item" href="PageForumAlumniEntreprise.php">Forum professionnel</a></li>
                        <li><a class="dropdown-item" href="PageForumEleve.php">Forum élève</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="Offres.php">Offres</a></li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Recherche</button>
            </form>
        </div>
    </div>
</nav>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../assets/img/img1.jpeg" class="d-block w-100" alt="Image 1">
            <div class="carousel-caption">
                <h5>Bienvenue au Projet LPRS</h5>
                <p>Rejoignez notre communauté dynamique.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/img/img2.jpeg" class="d-block w-100" alt="Image 2">
            <div class="carousel-caption">
                <h5>Des forums pour échanger</h5>
                <p>Participez à des discussions enrichissantes.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/img/img3.jpeg" class="d-block w-100" alt="Image 3">
            <div class="carousel-caption">
                <h5>Des opportunités professionnelles</h5>
                <p>Découvrez les offres adaptées à vos compétences.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
    </button>
</div>


<section class="container my-5">
    <h2>À propos de nous</h2>
    <p>Le Projet LPRS offre une plateforme d'échange pour les étudiants, les professionnels et les alumni. Notre
        objectif est de créer un espace interactif et inclusif où les utilisateurs peuvent partager leurs idées et
        opportunités.</p>
</section>

<section class="container my-5">
    <h2>Dernières nouvelles</h2>
    <p>Consultez les actualités récentes de nos forums et des offres professionnelles disponibles sur notre plateforme.
        Soyez à jour avec les dernières informations.</p>
</section>

<footer class="text-center text-lg-start">
    <div class="container p-4">
        <h6 class="text-uppercase fw-bold">Projet LPRS</h6>
        <p>Une plateforme pour connecter les étudiants, alumni et professionnels autour des projets et des opportunités.</p>
        <p>&copy; 2024 Projet LPRS. Tous droits réservés.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
