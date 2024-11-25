<?php

include '../bdd/Bdd.php';
include '../model/Forum.php';

$forum = new Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "date_messages" =>$_POST['date_messages'],
    "heure_messages" =>$_POST['heure_messages'],
    "canal" =>$_POST['canal']

]);
$forum-> afficherPost();
