<?php
<<<<<<< HEAD
=======

>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
class Utilisateur
{


    private $idutilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $nom_promo;
    private $cv;
    private $secteur_activite;
    private $classe;
    private $specialite_prof;
    private $poste_entreprise;
    private $role;

<<<<<<< HEAD
=======

>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }
    /**
     * @return mixed
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }
    /**
     * @param mixed $idutilisateur
     */
    public function setIdutilisateur($idutilisateur)
    {
        $this->idutilisateur = $idutilisateur;
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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
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
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNomPromo()
    {
        return $this->nom_promo;
    }

    /**
     * @param mixed $nom_promo
     */
    public function setNomPromo($nom_promo)
    {
        $this->nom_promo = $nom_promo;
    }

    /**
     * @return mixed
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * @param mixed $cv
     */
    public function setCv($cv)
    {
        $this->cv = $cv;
    }

    /**
     * @return mixed
     */
    public function getSecteurActivite()
    {
        return $this->secteur_activite;
    }

    /**
     * @param mixed $secteur_activite
     */
    public function setSecteurActivite($secteur_activite)
    {
        $this->secteur_activite = $secteur_activite;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getSpecialiteProf()
    {
        return $this->specialite_prof;
    }

    /**
     * @param mixed $specialite_prof
     */
    public function setSpecialiteProf($specialite_prof)
    {
        $this->specialite_prof = $specialite_prof;
    }

    /**
     * @return mixed
     */
    public function getPosteEntreprise()
    {
        return $this->poste_entreprise;
    }

    /**
     * @param mixed $poste_entreprise
     */
    public function setPosteEntreprise($poste_entreprise)
    {
        $this->poste_entreprise = $poste_entreprise;
    }

<<<<<<< HEAD

    public function inscription(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT nom FROM `utilisateur` WHERE nom=:nom');
        $req->execute(array(
            "nom" =>$this->getNom()

        ));
        $res = $req->fetch();
        if (is_array($res)){
            header("Location: ../../vue/inscription.php?erreur=0");
        }else{
            $req = $bdd->getBdd()->prepare('INSERT INTO `utilisateur`( `nom`, `prenom`, `mdp`, `role`) VALUES (:nom,:prenom,:mdp,:role)');
            $req->execute(array(
                'nom'=>$this->getNom(),
                'prenom'=>$this->getPrenom(),
                'mdp'=>$this->getMdp(),
                'role'=>$this->getRole(),
            ));
            header("Location: ../../vue/inscription.php");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE nom=:nom and mdp=:mdp and role=:role');
        $req->execute(array(
            "nom" =>$this->getNom(),
            "mdp" =>$this->getMdp(),
            "role"=>$this->getRole(),
=======
    /**
     * @return mixed
     */



    public function inscription() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO utilisateur (nom, prenom, email, mdp, nom_promo, cv, secteur_activite, classe, specialite_prof, poste_entreprise, role) 
         VALUES (:nom, :prenom, :email, :mdp, :nom_promo, :cv, :secteur_activite, :classe, :specialite_prof, :poste_entreprise, :role)'
        );
        $req->execute([
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
            'nom_promo' => $this->getNomPromo(),
            'cv' => $this->getCv(),
            'secteur_activite' => $this->getSecteurActivite(),
            'classe' => $this->getClasse(),
            'specialite_prof' => $this->getSpecialiteProf(),
            'poste_entreprise' => $this->getPosteEntreprise(),
            'role' => $this->getRole(),
        ]);

        header("Location: ../../vue/inscription.php?success"); // Redirection après succès
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
        ));
        $res = $req->fetch();
        if (is_array($res)){
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setRole($res["role"]);
            session_start();

            $_SESSION["utilisateur"] = $this;
<<<<<<< HEAD
            header("Location: ../../vue/accueil.php");
=======
            header("Location: ../../vue/pageaccueil.php");
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
<<<<<<< HEAD
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,mdp=:mdp,role=:role WHERE id_utilisateur=:id_utilisateur');

        $id_utilisateur = $this->getIdutilisateur();

        $res = $req->execute(array(
            "nom" =>$this->getNom(),
            "prenom" =>$this->getPrenom(),
            "mdp"=>$this->getMdp(),
            "role" =>$this->getRole(),
            "id_utilisateur" => $this->getIdutilisateur(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php?success");
        }else{
            header("Location: ../../vue/editer.php?id_utilisateur=".$this->getIdutilisateur()."&erreur");
=======
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,role=:role WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "role" =>$this->getRole(),
            "prenom" =>$this->getPrenom(),
            "nom" =>$this->getNom(),
            "id_utilisateur" =>$this->getIdutilisateur(),
        ));

        if ($res){
            header("Location: ../../vue/accueilid.php?success");
        }else{
            header("Location: ../../vue/edition.php?id_utilisateur=".$this->getIdutilisateur()."&erreur");
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
        }
    }
    public function supprimer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM utilisateur WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" =>$this->getIdutilisateur(),
        ));

        if ($res){
<<<<<<< HEAD
            return true;
        }else{
            return false;
        }
=======
            header("Location: ../../vue/accueilid.php?success");
        }else{
            header("Location: ../../vue/connexion.php?erreur");
        }
        var_dump();
>>>>>>> e53381d8345903d91904a8ff78efff0439b924de
    }

    public function afficherNom()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT nom FROM `utilisateur` WHERE nom=:nom');
        $req->execute(array(
            "nom" =>$this->getNom()

        ));
    }

}