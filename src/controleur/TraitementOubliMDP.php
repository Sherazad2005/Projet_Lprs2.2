<?php
include '../bdd/Bdd.php';
$bdd = new Bdd();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $newPassword = htmlspecialchars($_POST['new_password']);

    try {
        // Vérification si l'utilisateur existe dans la base de données
        $req = $bdd->getBdd()->prepare('SELECT id_utilisateur FROM utilisateur WHERE email = :email');
        $req->execute(['email' => $email]);
        $user = $req->fetch();

        if ($user) {
            // Hashage du nouveau mot de passe
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            // Mise à jour du mot de passe de l'utilisateur
            $updateReq = $bdd->getBdd()->prepare('UPDATE utilisateur SET mdp = :mdp WHERE email = :email');
            $updateReq->execute([
                'mdp' => $hashedPassword,
                'email' => $email
            ]);

            echo "Mot de passe réinitialisé avec succès !";
        } else {
            echo "Aucun utilisateur trouvé avec cet email.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
