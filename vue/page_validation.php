<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Utilisateur.php';
session_start();

function ListeUtilisateurEnatt($bdd) {
    $req = $bdd->getBdd()->prepare("SELECT * FROM utilisateur WHERE validated = 0");
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

$bdd = new Bdd();
$utilisateuratt = ListeUtilisateurEnatt($bdd);
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

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div id="notification" class="alert alert-success text-center" role="alert">
        L'utilisateur a été validé avec succès.
    </div>
<?php endif; ?>
<?php if (isset($_GET['erreur']) && $_GET['erreur'] == 1): ?>
    <div id="notification" class="alert alert-danger text-center" role="alert">
        Une erreur s'est produite lors de la validation de l'utilisateur.
    </div>
<?php endif; ?>
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
                <a class="navbar-brand mt-2 mt-lg-0" href="../src/controleur/TraitementProfil.php">
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
        <div id="overlay"></div>

        <div id="deconnexionForm">
            <h2>Voulez-vous vous déconnecter ?</h2>
            <div class="mt-3">
                <!-- Formulaire pour redirection -->
                <form action="page_ouverture.php" method="GET">
                    <button type="submit" class="btn btn-dark">Se déconnecter</button>
                </form>
                <!-- Bouton pour annuler -->
                <button class="btn btn-secondary mt-2" onclick="fermerFormulaireDeconnexion()">Annuler</button>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5">
    <h1>Validation des utilisateurs</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($utilisateuratt as $row): ?>
            <tr>
                <td><?= $row['id_utilisateur'] ?></td>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['prenom'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['role'] ?></td>
                <td>
                    <form action="../src/model/Validation.php" method="POST">
                        <input type="hidden" name="id_utilisateur" value="<?= $row['id_utilisateur'] ?>">
                        <button type="submit" name="action" value="Valider" class="btn btn-success">Valider</button>
                        <button type="submit" name="action" value="Rejeter" class="btn btn-danger">Rejeter</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer class="text-center mt-5">
    <p>2024 Projet LPRS.</p>
</footer>
</body>
</html>