<?php

include '../bdd/Bdd.php';
include '../model/Reponse.php';

$utilisateur = new \Reponse([
    "messages" =>$_POST['messages'],
]);
$utilisateur->ajouterUneReponse();
