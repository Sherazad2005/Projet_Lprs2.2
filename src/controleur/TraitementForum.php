<?php

include '../bdd/Bdd.php';
include '../model/Forum.php';

$utilisateur = new \Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "canal" =>$_POST['canal']
]);
$utilisateur->ajouterUnForum($_POST);



