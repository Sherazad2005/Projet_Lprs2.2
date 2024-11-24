<?php
require_once '../model/EntrepriseModel.php';
session_start();

class EntrepriseController {
    public function ajouterEntreprise($data) {
        try {
            $entreprise = new EntrepriseModel($data);
            $resultat  = $entreprise->ajouterEntreprise();
            $_SESSION['notification'] = $resultat ? 'success' : 'error';
            return $resultat;
        } catch (PDOException $e) {
            $_SESSION['notification'] = 'error';
            return false;
        }
    }

    public function editerEntreprise($data) {
        try {
            $entreprise = new EntrepriseModel($data);
            $result = $entreprise->editerEntreprise();
            $_SESSION['notification'] = $result ? 'success' : 'error';
            return $result;
        } catch (PDOException $e) {
            $_SESSION['notification'] = 'error';
            return false;
        }
    }

    public function supprimerEntreprise($id) {
        try {
            $entreprise = new EntrepriseModel(['id_entreprise' => $id]);
            $result = $entreprise->supprimerEntreprise();
            $_SESSION['notification'] = $result ? 'success' : 'error';
            return $result;
        } catch (PDOException $e) {
            $_SESSION['notification'] = 'error';
            return false;
        }
    }
}

$controller = new EntrepriseController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_GET['action'] ?? '';

    $data = [
        'nom' => $_POST['nom'] ?? null,
        'gerant' => $_POST['gerant'] ?? null,
        'adresse' => $_POST['adresse'] ?? null,
        'cp' => $_POST['cp'] ?? null,
        'email' => $_POST['email'] ?? null
    ];

    $success = false;

    switch ($action) {
        case 'ajouter':
            if (!empty($data['nom']) && !empty($data['gerant']) && !empty($data['adresse']) && !empty($data['cp']) && !empty($data['email'])) {
                $success = $controller->ajouterEntreprise($data);
            }
            break;

        case 'editer':
            if (!empty($data['nom']) && !empty($data['gerant']) && !empty($data['adresse']) && !empty($data['cp']) && !empty($data['email'])) {
                $success = $controller->editerEntreprise($data);
            }
            break;

        case 'supprimer':
            $id = $_POST['id_entreprise'] ?? null;
            if (!empty($id)) {
                $success = $controller->supprimerEntreprise($id);
            }
            break;
    }
    if ($success === true) {
        $_SESSION['notification'] = 'success';
        header('Location: ../../vue/profil_partenaire.php');
    } else {
        $_SESSION['notification'] = 'error';
        header('Location: ../../vue/profil_partenaire.php');
    }

    exit();
}
?>