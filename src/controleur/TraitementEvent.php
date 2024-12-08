<?php

include '../bdd/Bdd.php';
include '../model/Event.php';

$event = new \model\Event([
    "titre" =>$_POST['titre'],
    "description" =>$_POST['description'],
    "lieu" =>$_POST['lieu'],
    "elementsrequis" =>$_POST['elementsrequis'],
    "nombreplaces" =>$_POST['nombreplaces'],
]);
$event->ajouterUnEvent($_POST);
