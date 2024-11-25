<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM forum WHERE id_Forum = :id_Forum ') ;
$req->execute(array(
        'id_Forum' => $_GET['id_forum']?? 0,
    'id_utilisateur' => $_GET['id_utilisateur']?? 0
));
$res = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="A short description." />
<meta name="keywords" content="put, keywords, here" />
<title>PHP-MySQL forum</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<div id="wrapper">
    <div id="menu">
        <a class="item" href="pageaccueil.php">Page_accueil</a><br><br>
        <a class="item" href="NewForum.php">Crée une nouvelle discussion</nouve></a><br><br>
        <div id="content">
        </div>
    </div>
    <table class="table table-success table-striped">
        <tr>
            <th>Titre</th>
            <th>Sujet</th>
        </tr>

            <tr>
                <td><?= htmlspecialchars(trim($res['titre'] ?? '')) ?></td>
                <td><?= htmlspecialchars(trim($res['messages'] ?? '')) ?></td>
            </tr>

    </table>
</div>
</body>
</html>

