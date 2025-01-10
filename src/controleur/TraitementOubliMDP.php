<?php
include '../bdd/Bdd.php';
$bdd = new Bdd();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    $newPassword = htmlspecialchars($_POST['new_password']);

    try {
        $req = $bdd->getBdd()->prepare('SELECT id_utilisateur FROM utilisateur WHERE email = :email');
        $req->execute(['email' => $email]);
        $user = $req->fetch();

        if ($user) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

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
