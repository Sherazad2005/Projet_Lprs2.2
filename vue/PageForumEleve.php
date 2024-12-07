<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `forum` WHERE canal ="eleve/professeur"');
$req->execute(array());
$res = $req->fetchAll();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Général</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            border-bottom: 2px solid #203586;
        }
        .navbar-brand img {
            width: 40px;
            height: auto;
        }
        .forum-header {
            margin: 20px 0;
            text-align: center;
            color: #203586;
        }
        .forum-header h1 {
            font-size: 2.5rem;
        }
        .btn-nouveau {
            background-color: #203586;
            color: white;
            border: none;
        }
        .btn-nouveau:hover {
            background-color: #1a2c6b;
        }
        .table-container {
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px auto;
        }
        footer {
            background: #203586;
            color: white;
            padding: 20px;
        }
        footer h6 {
            font-size: 1.2rem;
        }
    </style>
</head>
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
<body>
<div class="container">
    <div class="forum-header">
        <h1>Forum Elève</h1>
        <p class="text-muted">Partagez et discutez ici.</p>
    </div>
    <div class="text-end mb-3">
        <a href="NewForum.php" class="btn btn-nouveau">+ Nouveau Sujet</a>
    </div>
    <div class="table-container">
        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Messages</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $forum): ?>
                <tr>
                    <td><a href="PageReponse.php?id_forum=<?= $forum['id_forum'] ?>"><?= htmlspecialchars($forum["titre"]) ?></a></td>
                    <td><?= htmlspecialchars($forum["messages"]) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<footer class="text-center">
    <h6 class="text-uppercase fw-bold">Projet LPRS</h6>
    <p>Une plateforme pour la communication et le partage.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

