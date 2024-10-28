<?php
if (isset($_GET["erreur"])) {
    echo "Il y a une erreur : ";
    if ($_GET["erreur"] == 0) {
        echo "Erreur lors de la suppression du compte.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un profil</title>
</head>
<body>

<form action="../src/controleur/TraitementSupp.php" method="post">
    Voulez-vous vraiment supprimer le compte <?= $_GET["nom"] ?> ?<br>
    <input type="hidden" name="id_utilisateur" value="<?= $_GET["nom"] ?>"/><br>
    <input type="submit" name="ins" value="Confirmer"/><br>
    <a href="accueil.php">Retour</a>
</form>
</body>
</html>

