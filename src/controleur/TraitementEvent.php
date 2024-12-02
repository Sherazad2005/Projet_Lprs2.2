<?php

include '../bdd/Bdd.php';
include '../model/Evenement.php';

$event = new \model\event([
    "nom" =>$_POST['nom'],
    "date" =>$_POST['date'],
    "inscrits" =>$_POST['inscrits'],
    "gerant" =>$_POST['gerant'],
]);
$event->ajouterUnEvent();