<?php
$offres = [
    [
        'id' => 1,
        'titre' => 'Développeur Web',
        'entreprise' => 'Tech Solutions',
        'lieu' => 'Paris, France',
        'date' => '01-11-2024',
        'description' => 'Nous recherchons un développeur web passionné pour rejoindre notre équipe.'
    ],
    [
        'id' => 2,
        'titre' => 'Designer UX/UI',
        'entreprise' => 'Creative Minds',
        'lieu' => 'Lyon, France',
        'date' => '02-11-2024',
        'description' => 'Un poste stimulant pour un designer UX/UI créatif et innovant.'
    ]
];
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
                <div class="card h-100" onclick="window.location.href='offre.php?id=<?php echo $offre['id']; ?>'">
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
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->

        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
</footer>
<!-- Footer -->
</body>
</html>
