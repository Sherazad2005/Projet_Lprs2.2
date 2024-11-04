<?php

require_once 'Bdd.php';
require_once 'Reponse.php';


$messages = $_POST['messages'];
$date_messages = date("Y-m-d");
$heure_messages = date("H:i:s");
$ref_forum = $_POST['ref_forum']; //

$donneesReponse = [
    'messages' => $messages,
    'date_messages' => $date_messages,
    'heure_message' => $heure_messages,
    'ref_forum' => $ref_forum
];


$reponse = new Reponse($donneesReponse);


$reponse->ajouterUneReponse();