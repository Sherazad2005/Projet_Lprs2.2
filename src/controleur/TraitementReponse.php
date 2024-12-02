<?php

include '../bdd/Bdd.php';
include '../model/Reponse.php';

$utilisateur = new \Reponse([
    "message" =>$_POST['message'],
]);
$utilisateur->ajouterUneReponse($_POST['id_forum']);
