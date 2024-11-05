<?php
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM forum WHERE id_Forum = :id_Forum') ;
$req->execute(array(
        'id_Forum' => $_GET['id_Forum']?? 0
));
$res = $req->fetch();
?>
<?php
$bdd = new Bdd();
$user = $bdd->getBdd()->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur') ;
$user->execute(array(
    'id_utilisateur' => $_GET['id_utilisateur']?? 0
));
$result = $user->fetch();
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
<h1>My forum</h1>
<div id="wrapper">
    <div id="menu">
        <a class="item" href="pageaccueil.php">Home</a> -
        <a class="item" href="NewForum.php">Crée une nouvelle discussion</nouve></a> -
        <div id="userbar">
            <div id="userbar">Hello Example. Not you? Log out.</div>
        </div>
        <div id="content">
        </div>
    </div>
</div>
</body>
</html>

