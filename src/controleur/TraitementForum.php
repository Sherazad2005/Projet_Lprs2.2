<?php

include '../bdd/Bdd.php';
include '../model/Forum.php';

$utilisateur = new \Forum([
    "titre" =>$_POST['titre'],
    "messages" =>$_POST['messages'],
    "canal" =>$_POST['canal']
]);
<<<<<<< HEAD:src/controleur/TraitementForum.php

$utilisateur->ajouterUnForum();

=======
$utilisateur->ajouterUnForum($_POST);
>>>>>>> 8d7f07b0dd5456de088a0254851c56c28be8837e:src/controller/TraitementForum.php



