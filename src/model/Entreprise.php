<?php

class Entreprise
{


    private $id_entreprise;
    private $nom;
    private $geran;
    private $adresse;
    private $cp;
    private $email;

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
    public function getIdEntreprise()
    {
        return $this->id_entreprise;
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
    public function getGeran()
    {
        return $this->geran;
    }

    /**
     * @param mixed $geran
     */
    public function setGeran($geran)
    {
        $this->geran = $geran;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */

    public function setEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new Exception("Format d'email invalide.");
        }
    }

    public function inscription()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO entreprise (nom, geran, adresse, cp, email) 
         VALUES (:nom, :geran, :adresse, :cp, :email)'
        );
        $req->execute([
            'nom' => $this->getNom(),
            'geran' => $this->getGeran(),
            'adresse' => $this->getAdresse(),
            'cp' => $this->getCp(),
            'email' => $this->getEmail(),
        ]);
        header("Location: ../../vue/AjoutEntreprise.php?success");


    }

    public function EditerEntreprise(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE entreprise SET nom=:nom,geran=:geran,adresse=:adresse,cp=:cp,email=:email WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            'nom' => $this->getNom(),
            'geran' => $this->getGeran(),
            'adresse' => $this->getAdresse(),
            'cp' => $this->getCp(),
            'email' => $this->getEmail(),
        ));

        if ($res){
            header("Location: ../../vue/EditerEntreprise.php?success");
        }else{
            header("Location: ../../vue/EditerEntreprise.php?id_entreprise=".$this->getIdEntreprise()."&erreur");
        }
    }

    public function SupprimerEntreprise(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM entreprise WHERE id_entreprise=:id_entreprise');
        $res = $req->execute(array(
            "id_entreprise" =>$this->getIdEntreprise(),
        ));

        if ($res){
            header("Location: ../../vue/accueilid.php?success");
        }else{
            header("Location: ../../vue/connexion.php?erreur");
        }
        var_dump();
    }


    public function AfficherEntreprise()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT nom FROM `utilisateur` WHERE nom=:nom');
        $req->execute(array(
            "nom" =>$this->getNom()

        ));
    }

}