<?php
include '../bdd/Bdd.php';

if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    $nom = $_GET['nom'];

    try {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE nom LIKE :nom');
        $req->execute(['nom' => '%' . $nom . '%']);
        $eleves = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la recherche : " . $e->getMessage();
        exit;
    }

    if ($eleves) {
        echo "<h2 style='text-align: center;'>Résultats de recherche pour '" . htmlspecialchars($nom) . "':</h2>";
        echo "<table style='width: 100%; border-collapse: collapse;'>";
        echo "<thead>";
        echo "<tr style='background-color: #a3f6f8;'>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>Nom</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>Prenom</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>Email</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>Classe</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>Promo</th>";
        echo "<th style='border: 1px solid #090909; padding: 8px; text-align: left;'>CV</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($eleves as $eleve) {
            echo "<tr>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['nom'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['prenom'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['email'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['classe'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['promo'] ?? 'N/A') . "</td>";
            echo "<td style='border: 1px solid #090909; padding: 8px;'>" . htmlspecialchars($eleve['cv'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Aucun élève trouvé pour le nom '" . htmlspecialchars($nom) . "'.</p>";
    }
}
?>
