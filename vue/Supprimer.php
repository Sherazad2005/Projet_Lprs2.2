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
<form action="../src/controller/TraitementSupp.php" method="post">
    Voulez-vous supprimer réellement le compte d'id <?=$_POST["id_utilisateur"] ?? 0?><br>
    <input type="number" name="id_utilisateur" value="<?=$_POST["id_utilisateur"] ?? 0?>"/><br>

    <input type="submit" name="ins" value="Confirmer"/><br>
    <a href="AnnuaireEleve.php">Retour</a>

</form>

</body>
</html>
