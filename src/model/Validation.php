<?php
require_once '../../src/bdd/Bdd.php';

$bdd = new Bdd();

function Valider($bdd, $id_utilisateur) {
    $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET validated = 1 WHERE id_utilisateur = ?');
    $result = $req->execute(array($id_utilisateur));
    if (!$result) {
        var_dump($req->errorInfo());
        return false;
    }
    return true;
}

function Rejeter($bdd, $id_utilisateur) {
    $req = $bdd->getBdd()->prepare('DELETE FROM utilisateur WHERE id_utilisateur = ?');
    $result = $req->execute(array($id_utilisateur));
    if (!$result) {
        var_dump($req->errorInfo());
        return false;
    }
    return true;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_utilisateur']) && isset($_POST['action'])) {
        $id_utilisateur = $_POST['id_utilisateur'];
        $action = $_POST['action'];

        $action_reussie = false;
        if ($action === 'Valider') {
            $action_reussie = Valider($bdd, $id_utilisateur);
        } elseif ($action === 'Rejeter') {
            $action_reussie1 = Rejeter($bdd, $id_utilisateur);
        }

        if ($action_reussie) {
            header('Location: ../../vue/page_validation.php?success=1');
        }
        elseif ($action_reussie1) {
            header('Location: ../../vue/page_validation.php?success=2');
        } else {
            header('Location: page_validation.php?error=erreur=1');
        }
        exit;
    } else {
        header('Location: page_validation.php?error=missing_data');
        exit;
    }
}
?>
