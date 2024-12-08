<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "Forum deja soumis";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création Forum</title>
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
</head>
<script>
    function updateFormAction() {
        const canal = document.getElementById("canal").value;
        const form = document.getElementById("newForm");

        if (canal === "generale") {
            form.action = "PageForumGenerale.php";
        } else if (canal === "entreprise/alumni") {
            form.action = "PageForumAlumniEntreprise.php";
        } else if (canal === "eleve/professeur") {
            form.action = "PageForumEleve.php";
        }
    }
</script>
<body>
<div class="form-container">
<form action="../src/controleur/TraitementForum.php" method="POST" enctype="multipart/form-data">
    <CENTER><img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Mountain" height="100"><br><br>
        <h2 class="mt-3">Création forum</h2></center>
    <div class="mb-3">
        <label for="titre" class="form-label"></label>
        <input type="text" name="titre" class="form-control" required placeholder="titre"></div>
    <div class="mb-3">
        <label for="messages" class="form-label"></label>
        <input type="text" name="messages" class="form-control" required placeholder="messages">
    </div>
    <div class="mb-3">
         <label for="canal" class="form-label"></label>
            <select name="canal" id="canal" class="form-control" onchange="updateFormAction()" required>
                <option value="">Canal </option>
                <option value="generale">Generale</option>
                <option value="entreprise/alumni">Entreprise-Alumni</option>
                <option value="eleve/professeur">Eleve-Professeur</option>
            </select></div>
    <br>

    <div class="d-grid gap-2">
        <input type="submit" name="ins" class="btn btn-primary"/> </div>
</form>
</div>
</body>
</html>