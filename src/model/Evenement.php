<?php

namespace model;

use Bdd;

class evenement
{
private $id_evenement;
private $gerant;
private $date;
private $inscrits;
private $titre;
private $type;
private $description;
private $lieu;
private $place_disponible;

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

    /**
     * @return mixed
     */
    public function getIdEvenement()
    {
        return $this->id_evenement;
    }

    /**
     * @param mixed $id_evenement
     */
    public function setIdEvenement($id_evenement)
    {
        $this->id_evenement = $id_evenement;
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
    public function getPlaceDisponible()
    {
        return $this->place_disponible;
    }

    /**
     * @param mixed $place_disponible
     */
    public function setPlaceDisponible($place_disponible)
    {
        $this->place_disponible = $place_disponible;
    }



    public function ajoutEvenement() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO event (gerant, date, inscrits, titre, type, description, lieu, place_disponible) VALUES (:gerant, :date, :inscrits, :titre, :type, :description, :lieu, :place_disponible)'
        );

        $req->execute([
            'gerant' => $this->gerant,
            'date' => $this->date,
            'inscrits' => $this->inscrits,
            'titre' => $this->titre,
            'type' => $this->type,
            'description' => $this->description,
            'lieu' => $this->lieu,
            'place_disponible' => $this->place_disponible
        ]);

        header("Location: ../../vue/Evenement.php?success=1");
    }

    public function editer_evenement()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE evenement SET gerant=:gerant, date=:date, inscrits=:inscrits, titre=:titre, type=:type, description=:description, lieu=:lieu, place_disponible=:place_disponlible WHERE id_event=:id_event');
        $res = $req->execute(array(
            "id_evenement" => $this->getIdEvenement(),
            "gerant" => $this->gerant,
            "date" => $this->date,
            "inscrits" => $this->inscrits,
            "titre" => $this->titre,
            "type" => $this->type,
            "description" => $this->description,
            "lieu" => $this->lieu,
            "place_disponible" => $this->place_disponible,
        ));

        if ($res) {
            header("Location: ../../vue/Evenement.php.");
        } else {
            header("Location: ../../vue/editer_event.php?id_event=" . $this->getIdEvenement() . "&erreur");
        }
    }

    public function supprimer_evenement()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM evenement WHERE id_evenement=:id_evenement');
        $res = $req->execute(array(
            "id_evenement" => $this->getIdEvenement(),
        ));

        if ($res) {
            header("Location: ../../vue/Evenement.php?succes=2");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
    }
}