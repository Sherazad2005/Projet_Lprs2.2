<?php

include '../bdd/Bdd.php';
include '../model/Contact.php';

var_dump($_POST);

$contact = new \model\Contact([
    "nom" =>$_POST['nom'],
    "prenom" =>$_POST['prenom'],
    "message" =>$_POST['Message'],
]);
$contact->contacter($_POST);

