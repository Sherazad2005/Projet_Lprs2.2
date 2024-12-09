<?php
include '../bdd/Bdd.php';

if (isset($_GET['titre']) && !empty($_GET['titre'])) {
    $titre = $_GET['titre'];

    try {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM offres WHERE titre LIKE :titre');
        $req->execute(['titre' => '%' . $titre . '%']);
        $offres = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la recherche : " . $e->getMessage();
        exit;
    }

    if ($offres) {
        echo "<h2 style='text-align: center;'>Résultats de recherche pour '" . htmlspecialchars($titre) . "':</h2>";
        echo "<table style='width: 100%; border-collapse: collapse;'>";
        echo "<thead>";
        echo "<tr style='background-color: #a3f6f8;'>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>id_offre</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>titre</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>description</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>missions</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>type</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>salaire</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>visibilite</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>etat</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($offres as $offres) {
            echo "<tr>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['id_offre'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['titre'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['description'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['missions'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['type'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['salaire'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['visibilite'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($offres['etat'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Aucun offre trouvé pour '" . htmlspecialchars($titre) . "'.</p>";
    }
}
?>
