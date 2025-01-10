<?php

namespace model;

use Bdd;

class Event
{
    private $id_event;
    private $titre;
    private $description;
    private $lieu;
    private $elementsrequis;
    private $nombreplaces;

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
    public function getElementsrequis()
    {
        return $this->elementsrequis;
    }

    /**
     * @param mixed $elementsrequis
     */
    public function setElementsrequis($elementsrequis)
    {
        $this->elementsrequis = $elementsrequis;
    }

    /**
     * @return mixed
     */
    public function getNombreplaces()
    {
        return $this->nombreplaces;
    }

    /**
     * @param mixed $nombreplaces
     */
    public function setNombreplaces($nombreplaces)
    {
        $this->nombreplaces = $nombreplaces;
    }

    public function ajouterUnEvent() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO event (titre, description, lieu, elementsrequis, nombreplaces) VALUES (:titre, :description, :lieu, :elementsrequis, :nombreplaces)'
        );

        $req->execute([
            'titre' => $this->getTitre(),
            'description' => $this->getDescription(),
            'lieu' => $this->getLieu(),
            'elementsrequis' => $this->getElementsRequis(),
            'nombreplaces' => $this->getNombreplaces(),
        ]);

        header("Location: ../../vue/participation_evenement_prof.php?success");
    }

    public function editer_event()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE event SET titre=:titre,description=:description,lieu=:lieu,elementsrequis=:elementsrequis,nombreplaces=:nombreplaces WHERE id_event=:id_event');
        $res = $req->execute(array(
            'id_event'=> $this->getIdEvent(),
            'titre'=> $this->getTitre(),
            'description'=> $this->getDescription(),
            'lieu'=> $this->getLieu(),
            'elementsrequis'=> $this->getElementsRequis(),
            'nombreplaces'=> $this->getNombreplaces(),
        ));

        if ($res) {
            header("Location: ../../vue//liste_evenement.php");
        } else {
            header("Location: ../../vue/editer_event.php?id_event=" . $this->getIdEvent() . "&erreur");
        }
    }

    public function editer_event1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE event SET titre=:titre,description=:description,lieu=:lieu,elementsrequis=:elementsrequis,nombreplaces=:nombreplaces WHERE id_event=:id_event');
        $res = $req->execute(array(
            'id_event'=> $this->getIdEvent(),
            'titre'=> $this->getTitre(),
            'description'=> $this->getDescription(),
            'lieu'=> $this->getLieu(),
            'elementsrequis'=> $this->getElementsRequis(),
            'nombreplaces'=> $this->getNombreplaces(),
        ));

        if ($res) {
            header("Location: ../../vue/participation_evenement_prof.php.");
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
            header("Location: ../../vue/participation_evenement_prof.php");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
    }

    public function supprimer1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM event WHERE id_event=:id_event');
        $res = $req->execute(array(
            "id_event" => $this->getIdEvent(),
        ));

        if ($res) {
            header("Location: ../../vue//liste_evenement.php?success");
        } else {
            header("Location: ../../vue/gestion.php?erreur");
        }
    }
    }