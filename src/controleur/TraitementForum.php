<?php

include '../bdd/Bdd.php';
include '../model/Forum.php';

$forum = new \Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "canal" =>$_POST['canal']
]);
$forum->ajouterUnForum();




