<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `forum` WHERE canal ="generale" OR "entreprise/alumni"');
$req->execute(array());
$res = $req->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum général</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#" ><span class="text-warning"><img src="../assets/images/logoLprs.png" alt="Logo" width="40" height="24"></span></a>
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
<table class="table table-success table-striped">
    <tr>
        <th>Titre</th>
        <th>Sujet</th>
    </tr>
    <?php
    foreach ($res as $forum){
        if ($forum->canal == "generale"){
        ?>
        <td><a href="PageReponse.php"><?=$forum["titre"] ?></a></td>
        <td><?=$forum["messages"] ?></td>
        <?php
        }
    }
    ?>
</table>
<table class="table table-success table-striped">
    <tr>
        <th>Titre</th>
        <th>Sujet</th>
    </tr>
    <?php
    foreach ($res as $forum){
        if ($forum->canal == "entreprise/alumni"){
            ?>
            <td><a href="PageReponse.php"><?=$forum["titre"] ?></a></td>
            <td><?=$forum["messages"] ?></td>
            <?php
        }
    }
    ?>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>


