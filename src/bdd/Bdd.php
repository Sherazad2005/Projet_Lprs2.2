<?php
class Bdd
{
    private $bdd;
    private $serveur = "localhost" ;
<<<<<<< HEAD
    private $nomBdd = "projet_lprs" ;
=======
    private $nomBdd = "projet_lprs";
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
    private $username = "root";
    private $password = "";


    public function __construct()
    {
        $this->bdd =  new PDO('mysql:host='.$this->serveur.';dbname='.$this->nomBdd, $this->username, $this->password);
    }

    public function getBdd(){
        return $this->bdd;
    }


<<<<<<< HEAD
=======


>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
}