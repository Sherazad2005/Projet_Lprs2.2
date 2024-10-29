<?php

use model\Forum;

include '../bdd/Bdd.php';
include '../model/Forum.php';

$utilisateur = new \Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "canal" =>$_POST['canal']
]);

<<<<<<< HEAD
$user->ajouterUnForum();
=======
$utilisateur->ajouterUnForum($_POST);
>>>>>>> 683a94af2356d2d0c7da51484a6ee7ca8fec0ebd



