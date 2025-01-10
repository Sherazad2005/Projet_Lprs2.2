<?php

class Entreprise
{
    private $id_entreprise;
    private $nom;
    private $gerant;
    private $adresse;
    private $cp;
    private $adresseWeb;

    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    /**
     * @return mixed
     */
    public function getIdEntreprise()
    {
        return $this->id_entreprise;
    }

    /**
     * @param mixed $id_entreprise
     */
    public function setIdEntreprise($id_entreprise)
    {
        $this->id_entreprise = $id_entreprise;
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
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getAdresseWeb()
    {
        return $this->adresseWeb;
    }

    /**
     * @param mixed $adresseWeb
     */
    public function setAdresseWeb($adresseWeb)
    {
        $this->adresseWeb = $adresseWeb;
    }


    public function ajouterEntreprise()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO entreprise (nom, gerant, adresse, cp, adresseWeb) VALUES (:nom, :gerant, :adresse, :cp, :adresseWeb)'
        );

        $req->execute([
            'nom' => $this->getNom(),
            'gerant' => $this->getGerant(),
            'adresse' => $this->getAdresse(),
            'cp' => $this->getCp(),
            'adresseWeb' => $this->getAdresseWeb()
            ]);

        header("Location: ../../vue/NewEntreprise.php?success");
    }

    public function editerEntreprise()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE entreprise SET nom=:nom, gerant=:gerant, adresse=:adresse, cp=:cp, adresseWeb=:adresseWeb WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            "id_entreprise" => $this->getIdEntreprise(),
            "nom" => $this->getNom(),
            "gerant" => $this->getGerant(),
            "adresse" => $this->getAdresse(),
            "cp" => $this->getCp(),
            "adresseWeb" => $this->getAdresseWeb(),
        ));

        if ($res) {
            header("Location: ../../vue/liste_entreprise.php?success");
        } else {
            header("Location: ../../vue/gestion.php?id_entreprise=" . $this->getIdEntreprise() . "&erreur");
        }
    }

    public function editerEntreprise1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE entreprise SET nom=:nom, gerant=:gerant, adresse=:adresse, cp=:cp, adresseWeb=:adresseWeb WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            "id_entreprise" => $this->getIdEntreprise(),
            "nom" => $this->getNom(),
            "gerant" => $this->getGerant(),
            "adresse" => $this->getAdresse(),
            "cp" => $this->getCp(),
            "adresseWeb" => $this->getAdresseWeb(),
        ));

        if ($res) {
            header("Location: ../../vue/listeEntreprise.php?success");
        } else {
            header("Location: ../../vue/gestion.php?id_entreprise=" . $this->getIdEntreprise() . "&erreur");
        }
    }

    public function supprimerEntreprise()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM entreprise WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            "id_entreprise" => $this->getIdEntreprise(),
        ));

        if ($res) {
            header("Location: ../../vue/liste_entreprise.php?success");
        } else {
            header("Location: ../../vue/gestion.php?erreur");
        }
    }
    public function supprimerEntreprise1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM entreprise WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            "id_entreprise" => $this->getIdEntreprise(),
        ));

        if ($res) {
            header("Location: ../../vue/listeEntreprise.php?success");
        } else {
            header("Location: ../../vue/gestion.php?erreur");
        }
    }

    }