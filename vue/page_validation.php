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

        form input, form select, form label, form button {
            width: 100%;
            margin-bottom: 1rem; /* Espacement vertical entre les champs */
        }
        /* Style pour les titres h1 */
        h1 {
            font-size: 2rem;
            color: #203586;
            font-family: 'Arial Black';
            font-weight: bold;
        }


        .blurred {
            filter: blur(5px);
            transition: filter 0.3s ease;
        }


        #deconnexionForm {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgb(32, 53, 134);
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
            background: rgb(101, 131, 241);
            z-index: 999;

            body {
                background-color: #f8f9fa;
                font-family: 'Roboto', sans-serif;
            }

        }
    </style>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="PageAcceuilConnect.php"><img src="../assets/img/logoLprs.png" alt="Logo"> Projet LPRS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="PageAcceuilConnect.php">Accueil</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>
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
    </nav>
</header>

<div class="container mt-5">
    <h1>Utilisateurs en att</h1>
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