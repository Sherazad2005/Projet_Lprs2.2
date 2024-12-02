<?php

namespace model;

use Bdd;

class Offres
{
    private $id_offre;
    private $titre;
    private $description;
    private $missions;
    private $type;
    private $salaire;
    private $visibilite;
    private $etat;
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
    public function getIdOffre()
    {
        return $this->id_offre;
    }

    /**
     * @param mixed $id_offre
     */
    public function setIdOffre($id_offre)
    {
        $this->id_offre = $id_offre;
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

    /**
     * @return mixed
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param mixed $missions
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;
    }

    /**
     * @return mixed
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * @param mixed $visibilite
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    public function ajouterOffre() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO offres (titre, description, missions, type, salaire, visibilite, etat) VALUES (:titre, :description, :missions, :type, :salaire, :visibilite, :etat)'
        );

        $req->execute([
            'titre'=> $this->getTitre(),
            'description'=> $this->getDescription(),
            'missions'=> $this->getMissions(),
            'type'=> $this->getType(),
            'salaire'=> $this->getSalaire(),
            'visibilite'=> $this->getVisibilite(),
            'etat'=> $this->getEtat(),
        ]);

        header("Location: ../../vue/offres_tableau.php?success");
    }

    public function editer_offre()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE offres SET titre=:titre,description=:description,missions=:missions,type=:type, salaire=:salaire, visibilite=:visibilite, etat=:etat WHERE id_offre=:id_offre');
        $res = $req->execute(array(
            "id_offre" => $this->getIdOffre(),
            "titre" => $this->getTitre(),
            "description" => $this->getDescription(),
            "missions" => $this->getMissions(),
            "type" => $this->getType(),
            "salaire" => $this->getSalaire(),
            "visibilite" => $this->getVisibilite(),
            "etat" => $this->getEtat(),
        ));

        if ($res) {
            header("Location: ../../vue/offres_tableau.php.");
        } else {
            header("Location: ../../vue/editer_offre.php?id_offre=" . $this->getIdOffre() . "&erreur");
        }
    }
    public function supprimer_offre()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM offres WHERE id_offre=:id_offre');
        $res = $req->execute(array(
            "id_offre" => $this->getIdOffre(),
        ));

        if ($res) {
            header("Location: ../../vue/offres_tableau.php");
        } else {
            header("Location: ../../vue/supprimer_offre.php?erreur");
        }
    }


}