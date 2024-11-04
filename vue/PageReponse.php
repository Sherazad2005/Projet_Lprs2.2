<?php
// Inclure les classes nécessaires
require_once '../src/bdd/Bdd.php';
require_once '../src/model/Post.php';

// Vérifier si un ID de post est passé dans l'URL
if (isset($_GET['id'])) {
    $postId = $_GET['id'];

    // Créer une instance de la classe Post et récupérer les détails du post
    $post = new Post();
    $details = $post->getDetails($postId); // Méthode pour obtenir les détails du post avec son ID
} else {
    echo "Aucun post sélectionné.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Post</title>
</head>
<body>
<?php if ($details): ?>
    <h1><?php echo htmlspecialchars($details['titre']); ?></h1>
    <p><?php echo htmlspecialchars($details['contenu']); ?></p>
    <p><em>Posté le : <?php echo htmlspecialchars($details['date_creation']); ?></em></p>
    <!-- Autres informations ou réponses liées au post peuvent être ajoutées ici -->
<?php else: ?>
    <p>Post non trouvé.</p>
<?php endif; ?>
</body>
</html>


