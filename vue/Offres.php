<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Utilisateur.php';
session_start();

$bdd = new Bdd();

$offres = [];
try {
    $req = $bdd->getBdd()->prepare('SELECT * FROM offre');
    $req->execute();
    $offres = $req->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur lors de la récupération des offres : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Offres d'Emploi</title>
    <style>
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            cursor: pointer;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>


<body>
<div class="container mt-5">
    <h2 class="mb-4">Offres d'Emploi</h2>
    <div class="row">
        <?php foreach ($offres as $offre): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100" onclick="window.location.href='offre.php?id=<?php echo $offre['id_entreprise']; ?>'">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($offre['titre']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($offre['entreprise']); ?></h6>
                        <p class="card-text">
                            <strong>Lieu : </strong><?php echo htmlspecialchars($offre['lieu']); ?><br>
                            <strong>Date : </strong><?php echo htmlspecialchars($offre['date']); ?><br>
                            <?php echo htmlspecialchars($offre['description']); ?>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="offre.php?id=<?php echo $offre['id']; ?>" class="btn btn-primary">Voir l'Offre</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<footer class="text-center mt-5">
    <p>2024 Projet LPRS.</p>
</footer>
</body>
</html>
