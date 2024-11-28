<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM forum as f, reponse as r, utilisateur as u WHERE f.id_Forum = :id_Forum and f.ref_utilisateur = u.id_utilisateur and f.id_Forum = r.ref_Forum') ;
var_dump($_GET['id_forum']?? 0);
$req->execute(array(
        'id_Forum' => $_GET['id_forum']?? 0,
));
$res = $req->fetch();

if (isset($_SESSION['id_utilisateur'])) {
    echo "Utilisateur connecté : " . $_SESSION['username'];
} else {
    echo "Aucun utilisateur connecté.";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum général</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" ><span class="text-warning"><img src="../assets/img/logoLprs.png" alt="Logo" width="40" height="24"></span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Offres.php">Offres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Recherche</button>
            </form>
        </div>
    </div>
</nav>
</head>
<body>
</body>
<h1><?=$res["titre"]?></h1>
<div id="wrapper">
    <div id="menu">
        <div id="userbar">
        </div>
        <div id="content">
        </div>
    </div>
        <p class="text-start"><?=$res["messages"]?></p>

    <p class="text-start"><?=$res["nom"]?> </p>

    <form action="../src/controleur/TraitementReponse.php" method="POST" enctype="multipart/form-data">
        <label for="messages"></label>
        <input type="text" name="messages" required placeholder="messages"><br><br>
        <label for="messages"></label>
        <input type="submit" name="ins"/><br>
        </div>
    </form>

</div>
</body>
</html>

