<?php

namespace model;

use Bdd;

class Event
{
private $id_event;
private $titre;
private $description;
private $lieu;
private $elements_requis;
private $nombre_de_places;

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
    public function getIdEvent()
    {
        return $this->id_event;
    }

    /**
     * @param mixed $id_event
     */
    public function setIdEvent($id_event)
    {
        $this->id_event = $id_event;
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
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getElementsRequis()
    {
        return $this->elements_requis;
    }

    /**
     * @param mixed $elements_requis
     */
    public function setElementsRequis($elements_requis)
    {
        $this->elements_requis = $elements_requis;
    }

    /**
     * @return mixed
     */
    public function getNombreDePlaces()
    {
        return $this->nombre_de_places;
    }

    /**
     * @param mixed $nombre_de_places
     */
    public function setNombreDePlaces($nombre_de_places)
    {
        $this->nombre_de_places = $nombre_de_places;
    }

    public function ajouterUnEvent() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO event (titre, description, lieu, elements_requis, nombre_de_places) VALUES (:titre, :description, :lieu, :elements_requis, :nombre_de_places)'
        );

        $req->execute([
            'titre'=> $this->getTitre(),
            'description'=> $this->getDescription(),
            'lieu'=> $this->getLieu(),
            'elements_requis'=> $this->getElementsRequis(),
            'nombre_de_places'=> $this->getNombreDePlaces(),
        ]);

        header("Location: ../../vue/participation_evenement_alumni.php?success");
    }

    public function editer_event()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE event SET titre=:titre,description=:description,lieu=:lieu,elements_requis=:elements_requis,nombre_de_places=:nombre_de_places WHERE id_event=:id_event');
        $res = $req->execute(array(
            'id_event'=> $this->getIdEvent(),
            'titre'=> $this->getTitre(),
            'description'=> $this->getDescription(),
            'lieu'=> $this->getLieu(),
            'elements_requis'=> $this->getElementsRequis(),
            'nombre_de_places'=> $this->getNombreDePlaces(),
        ));

        if ($res) {
            header("Location: ../../vue/participation_evenement_alumni.php.");
        } else {
            header("Location: ../../vue/editer_event.php?id_event=" . $this->getIdEvent() . "&erreur");
        }
    }

    public function supprimer_event()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM event WHERE id_event=:id_event');
        $res = $req->execute(array(
            "id_event" => $this->getIdEvent(),
        ));

        if ($res) {
            header("Location: ../../vue/participation_evenement_alumni.php");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
    }
}