<?php
// Connexion à la base de données et récupération des entreprises
include '../src/bdd/Bdd.php';
$bdd = new Bdd();

$entreprises = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT id_entreprise, nom FROM entreprise');
    $req->execute();
    $entreprises = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des entreprises : " . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">

    <style>

        form input, form select, form label, form button {
            width: 100%;
            margin-bottom: 1rem; /* Espacement vertical entre les champs */
        }
        /* Style pour les titres h1 */
        h1,h2 {
            font-size: 3rem;  /* Taille plus grande pour h1 */
            color: #302b2b;   /* Couleur bleue */
            font-family: 'Arial Black';
            font-weight: bold;  /* Texte en gras */
        }

        .blurred {
            filter: blur(5px);
            transition: filter 0.0s ease;
        }

        .form-container {
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
            width: 400px;
        }

        /* Champs spécifiques aux rôles */
        #eleveFields, #profFields, #alumniFields, #partenaireFields {
            display: none;
        }
    </style>

    <script>
        // Fonction pour afficher le formulaire de connexion et flouter l'arrière-plan
        function afficherFormulaireConnexion() {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("connexionForm").style.display = "block";
        }

        // Fonction pour fermer le formulaire de connexion et enlever le flou
        function fermerFormulaireConnexion() {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById("connexionForm").style.display = "none";
        }

        // Fonction pour afficher le formulaire et flouter l'arrière-plan
        function afficherFormulaire() {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("inscriptionForm").style.display = "block";
            form.classList.add("fadeIn");
        }

        // Fonction pour fermer le formulaire et enlever le flou
        function fermerFormulaire() {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById("inscriptionForm").style.display = "none";
        }

        // Fonction pour afficher les champs spécifiques en fonction du rôle sélectionné
        function afficherChampsSpecifiques() {
            const role = document.getElementById("role").value;
            document.getElementById("eleveFields").style.display = (role === "eleve") ? "block" : "none";
            document.getElementById("profFields").style.display = (role === "professeur") ? "block" : "none";
            document.getElementById("alumniFields").style.display = (role === "alumni") ? "block" : "none";
            document.getElementById("partenaireFields").style.display = (role === "partenaire") ? "block" : "none";
        }
    </script>
</head>
<body>

<div id="content">
    <!-- Contenu principal de la page -->
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h1>LPRS</h1>
                <p class="lead">Bienvenue sur le site des anciens élèves du lycée Robert Schuman. Découvrez nos formations, nos anciens élèves, et les opportunités professionnelles.</p>
                <a class="btn btn-dark me-3 dropdown-toggle hidden-arrow" href="#" onclick="afficherFormulaireConnexion()">Connexion</a>
                <button class="btn btn-dark me-3 dropdown-toggle hidden-arrow" onclick="afficherFormulaire()">Inscription</button>
            </div>
            <div class="col-md-6 text-center">
                <img src="../assets/img/façade-lycée-étoiles-1030x686.jpg" alt="Mountain" class="img-fluid rounded shadow" style="max-height: 300px;">
            </div>
        </div>
    </div>

    <!-- Section "Alumni et Etudiants" -->
    <div class="container mt-5">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <h1>Alumnis et Etudiants</h1>
                <p class="lead">Rejoignez notre réseau d'anciens élèves pour explorer des opportunités, retrouver vos camarades, et participer à des événements.</p>
                <p class="lead">Accédez à des offres de stage et d'emploi, développez votre réseau, et participez à nos forums interactifs.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="../assets/img/img1.jpeg" alt="Mountain" class="img-fluid rounded shadow" style="max-height: 300px;">
            </div>
        </div>
    </div>

    <!-- Section "Entreprises Partenaires" -->
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
</div>
<!-- Formulaire de connexion (initialement caché) -->
<div id="connexionForm" class="form-container">
    <form action="../src/controleur/TraitementConnexion.php" method="POST">
        <h2>Connexion</h2>
        <div class="form-group">
            <input type="email" class="form-control" name="email" required placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="mdp" required placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-dark">Se connecter</button>
            <button type="button" class="btn btn-secondary" onclick="fermerFormulaireConnexion()">Fermer</button>
        </div>
    </form>
</div>

<!-- Formulaire d'inscription (initialement caché) -->
<div id="inscriptionForm" class="form-container">
    <form action="../src/controleur/TraitementIns.php" method="POST" enctype="multipart/form-data">
        <h2>Bienvenue</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="nom" required placeholder="Nom">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="prenom" required placeholder="Prénom">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" required placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="mdp" required placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <select name="role" id="role" class="form-control" onchange="afficherChampsSpecifiques()" required>
                <option value="eleve">Élève</option>
                <option value="professeur">Professeur</option>
                <option value="alumni">Alumni</option>
                <option value="partenaire">Partenaire</option>
            </select>
        </div>

        <div id="eleveFields">
            <div class="form-group">
                <input type="text" name="classe" class="form-control" placeholder="Classe">
            </div>
            <div class="form-group">
                <input type="text" name="nomPromo_el" class="form-control" placeholder="Promo">
            </div>
            <div class="form-group">
                <input type="file" name="cv" class="form-control" accept=".pdf">
            </div>
        </div>

        <div id="profFields">
            <div class="form-group">
                <input type="text" name="specialiteProf" class="form-control" placeholder="Spécialité">
            </div>
        </div>

        <div id="alumniFields">
            <div class="form-group">
                <input type="text" name="secteur_activite" class="form-control" placeholder="Secteur d'activité">
            </div>
        </div>

        <div id="partenaireFields">
            <div class="form-group">
                <input type="text" name="posteEntreprise" class="form-control" placeholder="Poste">
            </div>
            <div class="form-group">
                <input type="text" name="motifInscription" class="form-control" placeholder="Motif d'inscription">
            </div>
            <div class="form-group">
                <select name="idEntreprise" class="form-control">
                    <option value="">Sélectionner une entreprise</option>
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= htmlspecialchars($entreprise['id_entreprise']) ?>">
                            <?= htmlspecialchars($entreprise['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-dark">S'inscrire</button>
            <button type="button" class="btn btn-secondary" onclick="fermerFormulaire()">Fermer</button>
        </div>
    </form>
</div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <section class="py-4">
        <div class="container text-center">
            <p>2024 Projet LPRS.</p>
        </div>
    </section>
</footer>

</body>
</html>
