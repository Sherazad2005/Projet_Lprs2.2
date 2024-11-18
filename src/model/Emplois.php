<?php

namespace model;

use Bdd;

class Emplois
{
    private $id_emplois;
    private $titre;
    private $entreprise;
    private $description;

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnee){
        foreach ($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdEmplois()
    {
        return $this->id_emplois;
    }

    /**
     * @param mixed $id_emplois
     */
    public function setIdEmplois($id_emplois)
    {
        $this->id_emplois = $id_emplois;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function ajouterUnEmplois() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO emplois ( titre, entreprise, description) VALUES (:titre, :entreprise, :description)'
        );

        $req->execute([
            'titre' => $this->getTitre(),
            'entreprise' => $this->getEntreprise(),
            'description' => $this->getDescription(),
        ]);

        header("Location: ../../vue/Opportunités_emplois.php?success");
    }

    public function editer_emplois()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE emplois SET titre=:titre,entreprise=:entreprise,description=:description WHERE id_emplois=:id_emplois');
        $res = $req->execute(array(
            "id_emplois" => $this->getIdEmplois(),
            "titre" => $this->getTitre(),
            "entreprise" => $this->getEntreprise(),
            "description" => $this->getDescription(),
        ));
        if ($res) {
            header("Location: ../../vue/Opportunités_emplois.php?success");
        } else {
            header("Location: ../../vue/editer.php?id_emplois=" . $this->getIdEmplois() . "&erreur");
        }
    }

}