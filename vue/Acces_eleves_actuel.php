<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un élève</title>
</head>
<body>
<h1>Rechercher un élève</h1>
<form action="../src/controleur/recherche.php" method="GET">
    <label for="nom">Nom de l'élève :</label>
    <input type="text" id="nom" name="nom" placeholder="Entrez un nom" required>
    <button type="submit">Rechercher</button>
</form>
</body>
</html>
