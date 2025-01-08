<?php

if (array_key_exists("erreur", $_GET)) {
    echo "if y a une erreur.";
    if ($_GET["erreur"] == 0) {
        echo "événements deja inscrit";
    }
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Professeur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">

    <style>
        form input, form select, form label, form button {
            width: 100%; margin-bottom: 1rem; }

        .blurred {
            filter: blur(5px); transition: filter 0.3s ease; }

        .form-container {
            display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 2rem; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); z-index: 1000; width: 400px; }

        #eleveFields, #profFields, #alumniFields, #partenaireFields {
            display: none; }

        #overlay {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; }

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

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .row {
            width: 20%;
        }

        .btn {
            margin-bottom: 1rem;
        }

    </style>

    <script>

        function afficherChampsSpecifiques() {
            const role = document.getElementById("role").value;
            document.getElementById("eleveFields").style.display = (role === "eleve") ? "block" : "none";
            document.getElementById("profFields").style.display = (role === "professeur") ? "block" : "none";
            document.getElementById("alumniFields").style.display = (role === "alumni") ? "block" : "none";
            document.getElementById("partenaireFields").style.display = (role === "partenaire") ? "block" : "none";
        }

        function afficherFormulaire(id) {
            document.getElementById("content").classList.add("blurred");
            document.getElementById(id).style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function fermerFormulaire(id) {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById(id).style.display = "none";
            document.getElementById("overlay").style.display = "none";
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
                        style="height: 50px; object-fit: contain;"
                        alt="LPRS"
                        loading="lazy"
                />
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-primary mx-2" href="Contact.php">Contact</a></li>
            </ul>

            <button class="btn btn-dark me-3" onclick="afficherFormulaire('deconnexionForm')">Déconnexion</button>
        </div>
    </nav>
</header>

<div id="content" class="container">
    <center><h2>Bienvenue sur votre espace !</h2></center><br><br>
    <div class="row align-items-center">
        <div class="col-md-6 text-center">

            <a class="btn btn-dark btn-lg mb-3" href="annuiare_anciens_eleves_alumni.php" style="width: 200px; height: 60px;">
                Accès aux profils des anciens
            </a>

            <a class="btn btn-dark btn-lg mb-3" href="AnnuaireEleve.php" style="width: 200px; height: 60px;">
                Accès aux profils des étudiants actuel
            </a>

            <a class="btn btn-dark btn-lg mb-3" href="event.php" style="width: 200px; height: 60px;">
                Publication d'évènements
            </a>

            <a class="btn btn-dark btn-lg mb-3" href="offres.php" style="width: 200px; height: 60px;">
                Publier une offre
            </a>

            <a class="btn btn-dark btn-lg mb-3" href="Emplois.php" style="width: 200px; height: 60px;">
                Publier un emploi
            </a>

            <a class="btn btn-dark btn-lg mb-3" href="offres_tableau.php" style="width: 200px; height: 60px;">
                Accès à la section des offres
            </a>

        </div>
    </div>
</div>
<div id="deconnexionForm" class="form-container">
    <h2>Voulez-vous vous déconnecter ?</h2>
    <form action="page_ouverture.php" method="GET">
        <button type="submit" class="btn btn-dark">Se déconnecter</button>
    </form>
    <button class="btn btn-secondary" onclick="fermerFormulaire('deconnexionForm')">Annuler</button>
</div>

</body>
</html>