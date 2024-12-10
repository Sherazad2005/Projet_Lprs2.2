<?php

class EntrepriseModel {
    private $id_entreprise;
    private $nom;
    private $gerant;
    private $adresse;
    private $cp;
    private $email;

    public function __construct(array $donnee) {
        $this->hydrate($donnee);
    }

    public function hydrate(array $donnee) {
        foreach ($donnee as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getIdEntreprise() {
        return $this->id_entreprise;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getGerant() {
        return $this->gerant;
    }

    public function setGerant($gerant) {
        $this->gerant = $gerant;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getCp() {
        return $this->cp;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception("Format d'email invalide.");
        }
    }

    public function ajouterEntreprise() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO entreprise (nom, gerant, adresse, cp, email) 
         VALUES (:nom, :gerant, :adresse, :cp, :email)'
        );
        $result = $req->execute([
            'nom' => $this->getNom(),
            'gerant' => $this->getGerant(),
            'adresse' => $this->getAdresse(),
            'cp' => $this->getCp(),
            'email' => $this->getEmail(),
        ]);

        // Redirection après exécution
        if ($result) {
            header("Location: ../../vue/pageacceuil.php?succes=1");
            exit; // Stoppe le script après redirection
        } else {
            throw new Exception("Échec de l'ajout de l'entreprise.");
        }
    }


    public function editerEntreprise() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'UPDATE entreprise SET nom=:nom, gerant=:gerant, adresse=:adresse, cp=:cp, email=:email 
             WHERE id_entreprise=:id_entreprise'
        );
        return $req->execute([
            'nom' => $this->getNom(),
            'gerant' => $this->getGerant(),
            'adresse' => $this->getAdresse(),
            'cp' => $this->getCp(),
            'email' => $this->getEmail(),
            'id_entreprise' => $this->getIdEntreprise()
        ]);
    }

    public function supprimerEntreprise() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM entreprise WHERE id_entreprise=:id_entreprise');
        return $req->execute(['id_entreprise' => $this->getIdEntreprise()]);
    }
}