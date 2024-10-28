<?php

use model\Forum;

include '../bdd/Bdd.php';
include '../model/Forum.php';

$user = new \Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "canal" =>$_POST['canal']
]);

$user->ajouterUnForum($_POST);



