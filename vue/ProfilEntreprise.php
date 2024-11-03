<?php
session_start();
if (isset($_SESSION['notification'])): ?>
    <div class="alert alert-<?php echo $_SESSION['notification'] === 'success' ? 'success' : 'danger'; ?>" role="alert">
        <?php echo $_SESSION['notification'] === 'success' ? 'Opération réussie!' : 'Une erreur s\'est produite.'; ?>
    </div>
    <?php unset($_SESSION['notification']); ?>
<?php endif;
require_once '../src/model/Utilisateur.php';


$utilisateurData = [
    'id_utilisateur' => 1,
    'nom' => 'Jean',
    'prenom' => 'Dupont',
    'email' => 'jean.dupont@example.com',
    'photo' => 'https://via.placeholder.com/150'
];

$utilisateur = new Utilisateur($utilisateurData);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Partenaire</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        #formulaireAjout {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        #formulaireAjout.show {
            display: block;
            opacity: 1;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Profil Utilisateur</h2>

    <div class="card">
        <div class="card-header text-center">
            // img//
            <h4><?php echo $utilisateur->getNom(); ?></h4>
            <h4><?php echo $utilisateur->getPrenom(); ?></h4>
        </div>
        <div class="card-body">
            <p><strong>Nom : </strong></p>
            <p><strong>Prénom : </strong></p>
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

    <div class="mt-3">
        <a href="../../vue/accueilid.php" class="btn btn-secondary">Retour</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#ajouterEntrepriseBtn').click(function() {
            $('#formulaireAjout').toggleClass('show');
        });
        $(document).ready(function() {
            $('#ajouterEntrepriseBtn').click(function() {
                $('#formulaireAjout').toggleClass('show');
            });

        $('#annulerBtn').click(function() {
            $('#formulaireAjout').removeClass('show');
        });
    });
</script>
</body>
</html>
