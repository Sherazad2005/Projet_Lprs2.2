<?php
require_once '../src/model/Utilisateur.php';
session_start();

$utilisateurData = [
    'id_utilisateur' => $_SESSION['utilisateur']['id_utilisateur'],
    'nom' => $_SESSION['utilisateur']['nom'],
    'prenom' => $_SESSION['utilisateur']['prenom'],
    'email' => $_SESSION['utilisateur']['email'],
    'role' => $_SESSION['utilisateur']['role'],
    'nom_promo' => $_SESSION['utilisateur']['nom_promo'],
    'classe' => $_SESSION['utilisateur']['classe'],
    'specialite_prof' => $_SESSION['utilisateur']['specialite_prof'],
    'poste_entreprise' => $_SESSION['utilisateur']['poste_entreprise'],
    'secteur_activite' => $_SESSION['utilisateur']['secteur_activite'],
    'motif_inscription' => $_SESSION['utilisateur']['motif_inscription'],
    'id_entreprise' => $_SESSION['utilisateur']['id_entreprise']
];

$utilisateur = new Utilisateur($utilisateurData);
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
        h1 {
            font-size: 2rem;  /* Taille plus grande pour h1 */
            color: #302b2b;   /* Couleur bleue */
            font-family: 'Arial Black';
            font-weight: bold;  /* Texte en gras */
        }

        /* Flou pour l'arrière-plan */
        .blurred {
            filter: blur(5px);
            transition: filter 0.3s ease;
        }

        /* Modale centrée */
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

        /* Ombre pour désactiver les clics à l'extérieur */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
    <script>
        // Afficher la fenêtre de déconnexion avec flou de l'arrière-plan
        function afficherFormulaireDeconnexion() {
            document.getElementById("content").classList.add("blurred");
            document.getElementById("overlay").style.display = "block";
            document.getElementById("deconnexionForm").style.display = "block";
        }

        // Masquer la fenêtre de déconnexion et retirer le flou
        function fermerFormulaireDeconnexion() {
            document.getElementById("content").classList.remove("blurred");
            document.getElementById("overlay").style.display = "none";
            document.getElementById("deconnexionForm").style.display = "none";
        }
    </script>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand mt-2 mt-lg-0" href="#">
                <img
                        src="../assets/img/_6b0231d1-ab09-4387-9783-e6f072408b6d.jpg"
                        class="img-fluid rounded"
                        style="height: 50px; width: auto; object-fit: contain;"
                        alt="LPRS"
                        loading="lazy"
                />
            </a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="btn btn-dark mx-2" data-mdb-ripple-init href="pageaccueil.php" role="button">Accueil</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" data-mdb-ripple-init href="AnnuaireEleve.php" role="button">Annuaire</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" data-mdb-ripple-init href="PageForumAlumniEntreprise.php" role="button">Forum</a></li>
                <li class="nav-item"><a class="btn btn-dark mx-2" data-mdb-ripple-init href="Offres.php" role="button">Offres</a></li>
            </ul>

            <a class="btn btn-dark me-3 dropdown-toggle hidden-arrow" href="#" onclick="afficherFormulaireDeconnexion()">Déconnection</a>
            <div class="dropdown">
                <a class="navbar-brand mt-2 mt-lg-0" href="#">
                    <img
                            src="../assets/img/istockphoto-1300845620-612x612.jpg"
                            class="img-fluid rounded"
                            style="height: 50px; width: auto; object-fit: contain;"
                            alt="LPRS"
                            loading="lazy"
                    />
                </a>
            </div>
        </div>
    </nav>
</header>




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
        <a href="../../vue/pageacceuil.php" class="btn btn-secondary">Retour</a>
    </div>




</div><footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
    <section class="py-4">
        <div class="container text-center">
            <p> 2024 Projet LPRS.</p>
        </div>
    </section>
</footer>
</body>
