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
</head>
<body>
<form action="../src/controleur/TraitementSupp.php" method="post">
    Voulez-vous vraiment supprimer le compte d'id <?= htmlspecialchars($_POST["id_utilisateur"] ?? '') ?><br>
    <input type="number" name="id_utilisateur" value="<?= htmlspecialchars($_POST["id_utilisateur"] ?? '') ?>" required/><br>

    <input type="submit" name="ins" value="Confirmer"/><br>
    <a href="accueil.php">Retour</a>

</form>

</body>
</html>
