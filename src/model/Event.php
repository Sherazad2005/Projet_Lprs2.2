<?php

namespace model;

use Bdd;

class event
{
private $id_event;
private $nom;
private $date;
private $inscrits;
private $gerant;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getInscrits()
    {
        return $this->inscrits;
    }

    /**
     * @param mixed $inscrits
     */
    public function setInscrits($inscrits)
    {
        $this->inscrits = $inscrits;
    }

    /**
     * @return mixed
     */
    public function getGerant()
    {
        return $this->gerant;
    }

    /**
     * @param mixed $gerant
     */
    public function setGerant($gerant)
    {
        $this->gerant = $gerant;
    }

    public function ajouterUnEvent() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO event (nom, date, inscrits, gerant) VALUES (:nom, :date, :inscrits, :gerant)'
        );

        $req->execute([
            'nom'=> $this->getNom(),
            'date'=> $this->getDate(),
            'inscrits'=> $this->getInscrits(),
            'gerant'=> $this->getGerant(),
        ]);

        header("Location: ../../vue/participation_evenement_alumni.php?success");
    }

    public function editer_event()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE event SET nom=:nom,date=:date,inscrits=:inscrits,gerant=:gerant WHERE id_event=:id_event');
        $res = $req->execute(array(
            "id_event" => $this->getIdEvent(),
            "nom" => $this->getNom(),
            "date" => $this->getDate(),
            "inscrits" => $this->getInscrits(),
            "gerant" => $this->getGerant(),
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