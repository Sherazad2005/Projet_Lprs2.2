<?php

namespace model;

use Bdd;

class Contact
{
    private $id_contact;
    private $nom;
    private $prenom;
    private $message;

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnee)
    {
        foreach ($donnee as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->id_contact;
    }

    /**
     * @param mixed $id_contact
     */
    public function setIdContact($id_contact)
    {
        $this->id_contact = $id_contact;
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
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function contacter()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO contact ( nom, prenom, message) VALUES (:nom, :prenom, :message)'
        );

        $req->execute([
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'message' => $this->getMessage(),
        ]);

        header("Location: ../../vue/Contact.php?success");
    }
}