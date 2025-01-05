<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <title>Oubli de mot de passe</title>
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
<body>
<div class="form-container">
    <center>
        <img src="../assets/img/50-Lycee-Robert-Schuman.jpg" alt="Logo" height="100">
        <h2 class="mt-3">Réinitialisation du mot de passe</h2>
    </center>
    <form action="../src/controleur/TraitementOubliMDP.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse e-mail" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Entrez votre nouveau mot de passe" required>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Réinitialiser</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>