<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher une offre</title>
</head>
<body>
<h1>Rechercher une offre</h1>
<form action="../src/controleur/recherche_offre.php" method="GET">
    <label for="titre">Titre de l'offre :</label>
    <input type="text" id="titre" name="titre" placeholder="Entrez le titre" required>
    <button type="submit">Rechercher</button>
</form>
</body>
</html>
