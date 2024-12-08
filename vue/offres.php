<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "emplois deja inscrit";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Emplois</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<style>
    body {
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .form-container {
        background: #fff;
        border-radius: 10px;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 500px;
    }
    .form-container h2 {
        margin-bottom: 1.5rem;
    }
    .hidden {
        display: none;
    }
</style>
<body>
<div class="form-container">
<form action="../src/controleur/TraitementOffres.php" method="POST" enctype="multipart/form-data">
    <center><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br><br></center>
    <div class="mb-3">
        <label for="titre" class="form-label"></label>
     <input class="form-control" type="text" name="titre" placeholder="titre"/>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label"></label>
     <input class="form-control" type="text" name="description" placeholder="description"/>
    </div>
    <div class="mb-3">
        <label for="missions" class="form-label"></label>
     <input class="form-control" type="text" name="missions" placeholder="missions"/>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label"></label>
     <input class="form-control" type="text" name="type" placeholder="type"/>
    </div>
    <div class="mb-3">
        <label for="salaire" class="form-label"></label>
     <input class="form-control" type="number" name="salaire" placeholder="salaire"/>
    </div>
    <div class="mb-3">
        <label for="visibilite" class="form-label"></label>
        <input class="form-control" type="text" name="visibilite" placeholder="visibilite"/>
    </div>
    <div class="mb-3">
        <label for="etat" class="form-label"></label>
        <input class="form-control" type="text" name="etat" placeholder="etat"/>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary">Valider</button></div>

</form>
</div>

</footer>

</body>
</html>