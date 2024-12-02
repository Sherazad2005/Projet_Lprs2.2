<?php
if (array_key_exists("erreur", $_POST)) {
    echo "Il y a une erreur.";
    if ($_POST["erreur"] == 0) {
        echo "Identifiant déjà utilisé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un profil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

<form action="../src/controleur/TraitementSupp_offre.php" method="post">
    <br>
    Voulez-vous supprimer réellement le compte d'id ?<?=$_GET["id_offre"]?><br>
    <input type="number" name="id_offre" value="<?=$_GET["id_offre"]?>"/><br><br>

    <input type="submit" name="ins" value="Confirmer"/><br><br>
    <a href="offres_tableau.php">Retour</a>

</form>
<footer class="text-center text-lg-start bg-body-tertiary text-muted">

    <section class="">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Projet LPRS
                    </h6>

                </div>
</footer>
</body>
</html>