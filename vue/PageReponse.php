<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `forum` ');
$req->execute(array());
$res = $req->fetchAll();

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
    <table>
        <tr>
            <th>Titre</th>
            <th>Messages</th>
        </tr>
        <?php
        foreach ($res as $forum){
        ?>
            <tr>
                <td><?= htmlspecialchars(trim($forum['titre'] ?? '')) ?></td>
                <td><?= htmlspecialchars(trim($forum['messages'] ?? '')) ?></td>
            </tr>

            <?php
        }
        ?>
    </table>
    <a href="" >Répondre</a>
</div>
</body>
</html>

