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
            background-color: #f1f5f8;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url('../assets/img/hero-bg.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .hero .btn {
            padding: 10px 30px;
            font-size: 1rem;
            border-radius: 50px;
            background-color: #6583f1;
            color: #333;
            border: none;
            transition: all 0.3s ease;
        }

        .hero .btn:hover {
            background-color: #6583f1;
        }

        
        .features {
            padding: 60px 0;
            background-color: #fff;
            text-align: center;
        }

        .features h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            color: #203586;
        }

        .features .feature {
            margin-bottom: 20px;
        }

        .features .feature i {
            font-size: 2rem;
            color: #6583f1;
            margin-bottom: 15px;
        }

        .features p {
            font-size: 1rem;
            color: #666;
        }


        footer {
            background-color: #203586;
            color: #fff;
            padding: 30px 0;
        }

        footer h6 {
            font-size: 1.25rem;
            margin-bottom: 15px;
        }

        footer p {
            font-size: 0.9rem;
        }

        footer a {
            color: #ffdd57;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffc107;
            text-decoration: underline;
        }
    </style>
</head>
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
                <li class="nav-item"><a class="nav-link active" href="pageaccueil.php">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="Inscription.php">Inscription</a></li>
                        <li><a class="dropdown-item" href="Connexion.php">Connexion</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="Offres.php">Offres</a></li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-primary" type="submit">Recherche</button>
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
            <img src="../assets/img/img2.jpg" class="d-block w-100" alt="Image 2">
            <div class="carousel-caption">
                <h5>Des forums pour échanger</h5>
                <p>Participez à des discussions enrichissantes.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../assets/img/img3.gif" class="d-block w-100" alt="Image 3">
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


<section id="features" class="features">
    <div class="container">
        <h2>Pourquoi nous choisir ?</h2>
        <div class="row">
            <div class="col-md-4 feature">
                <i class="fas fa-users"></i>
                <h5>Communauté dynamique</h5>
                <p>Participez à des échanges enrichissants avec nos forums interactifs.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-briefcase"></i>
                <h5>Opportunités professionnelles</h5>
                <p>Trouvez des offres d'emploi adaptées à vos compétences.</p>
            </div>
            <div class="col-md-4 feature">
                <i class="fas fa-graduation-cap"></i>
                <h5>Événements éducatifs</h5>
                <p>Participez à des webinaires et des conférences pour booster vos compétences.</p>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-md-start">
            <h1>Entreprises Partenaires</h1>
            <p class="lead">Publiez vos offres, recherchez des talents parmi nos alumni, et collaborez avec notre établissement.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="../assets/img/Capture%20d'écran%202024-11-23%20191950.png" alt="Mountain" class="img-fluid rounded shadow" style="max-height: 300px;">

        </div>
    </div>
</div>
<br>
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
