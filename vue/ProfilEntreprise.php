<?php
// Assurez-vous d'inclure le modèle et de récupérer les données de l'utilisateur
require_once '../model/Utilisateur.php'; // Modèle à adapter selon vos besoins

// Exemple d'initialisation de l'utilisateur
// En réalité, vous devriez récupérer l'utilisateur depuis la base de données
$utilisateurData = [
    'id_utilisateur' => 1,
    'nom' => 'Jean Dupont',
    'email' => 'jean.dupont@example.com',
    'photo' => 'https://via.placeholder.com/150' // Remplacez par le chemin de la photo de l'utilisateur
];

$utilisateur = new Utilisateur($utilisateurData);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profil Utilisateur</title>
    <style>
        #formulaireAjout {
            display: none; /* Cacher le formulaire au départ */
            opacity: 0; /* Initialement transparent */
            transition: opacity 0.5s ease; /* Animation pour l'apparition */
        }
        #formulaireAjout.show {
            display: block; /* Afficher le formulaire */
            opacity: 1; /* Rendre le formulaire visible */
        }
    </style>
</head>
<body>
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
            <!-- Ajoutez d'autres informations utilisateur ici si nécessaire -->
        </div>
        <div class="card-footer text-center">
            <button id="ajouterEntrepriseBtn" class="btn btn-primary">Ajouter une Entreprise</button>
        </div>
    </div>

    <!-- Formulaire pour ajouter une entreprise -->
    <div id="formulaireAjout" class="mt-4 card">
        <div class="card-header">
            <h5>Ajouter une Entreprise</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="nomEntreprise">Nom de l'Entreprise</label>
                    <input type="text" class="form-control" id="nomEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="adresseEntreprise">Adresse</label>
                    <input type="text" class="form-control" id="adresseEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="cpEntreprise">Code Postal</label>
                    <input type="text" class="form-control" id="cpEntreprise" required>
                </div>
                <div class="form-group">
                    <label for="emailEntreprise">Email</label>
                    <input type="email" class="form-control" id="emailEntreprise" required>
                </div>
                <button type="submit" class="btn btn-success">Ajouter</button>
                <button type="button" class="btn btn-secondary" id="annulerBtn">Annuler</button>
            </form>
        </div>
    </div>

    <div class="mt-3">
        <a href="../../vue/accueilid.php" class="btn btn-secondary">Retour</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajouterEntrepriseBtn').click(function() {
            $('#formulaireAjout').toggleClass('show'); // Toggle visibility avec animation
        });

        $('#annulerBtn').click(function() {
            $('#formulaireAjout').removeClass('show'); // Cacher le formulaire si l'utilisateur clique sur Annuler
        });
    });
</script>
</body>
</html>
