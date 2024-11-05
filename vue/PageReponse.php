<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM forum WHERE id_Forum = :id_Forum') ;
$req->execute(array(
        'id_Forum' => $_GET['id_Forum']?? 0
));
$res = $req->fetch();
?>
<?php
$bdd = new Bdd();
$user = $bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur') ;
$user->execute(array(
    'id_utilisateur' => $_GET['id_utilisateur']?? 0
));
$result = $user->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="A short description." />
<meta name="keywords" content="put, keywords, here" />
<title>PHP-MySQL forum</title>
<link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>
<h1>My forum</h1>
<div id="wrapper">
    <div id="menu">
        <a class="item" href="pageaccueil.php">Home</a> -
        <a class="item" href="NewForum.php">Crée une nouvelle discussion</nouve></a> -
        <div id="userbar">
            <div id="userbar">Hello Example. Not you? Log out.</div>
        </div>
        <div id="content">
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
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

