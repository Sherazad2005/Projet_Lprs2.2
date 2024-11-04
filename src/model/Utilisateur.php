<?php

class Utilisateur
{


    private $idUtilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $nomPromo;
    private $cv;
    private $motifInscription;
    private $classe;
    private $specialiteProf;
    private $posteEntreprise;
    private $idEntreprise;
    private $role;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
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
    public function getNomPromo()
    {
        return $this->nomPromo;
    }

    /**
     * @param mixed $nomPromo
     */
    public function setNomPromo($nomPromo)
    {
        $this->nomPromo = $nomPromo;
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
    public function getMotifInscription()
    {
        return $this->motifInscription;
    }

    /**
     * @param mixed $motifInscription
     */
    public function setMotifInscription($motifInscription)
    {
        $this->motifInscription = $motifInscription;
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
        return $this->specialiteProf;
    }

    /**
     * @param mixed $specialiteProf
     */
    public function setSpecialiteProf($specialiteProf)
    {
        $this->specialiteProf = $specialiteProf;
    }

    /**
     * @return mixed
     */
    public function getPosteEntreprise()
    {
        return $this->posteEntreprise;
    }

    /**
     * @param mixed $posteEntreprise
     */
    public function setPosteEntreprise($posteEntreprise)
    {
        $this->posteEntreprise = $posteEntreprise;
    }

    /**
     * @return mixed
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * @param mixed $idEntreprise
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
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






    public function inscription() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO utilisateur (nom, prenom, email, mdp, nom_promo, cv, motif_inscription, classe, specialite_prof, poste_entreprise, role, id_entreprise) 
         VALUES (:nom, :prenom, :email, :mdp, :nom_promo, :cv, :motif_inscription, :classe, :specialite_prof, :poste_entreprise, :role, :id_entreprise)'
        );
        $req->execute([
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
            'nom_promo' => $this->getNomPromo(),
            'cv' => $this->getCv(),
            'motif_inscription' => $this->getMotifInscription(),
            'classe' => $this->getClasse(),
            'specialite_prof' => $this->getSpecialiteProf(),
            'poste_entreprise' => $this->getPosteEntreprise(),
            'role' => $this->getRole(),
            'id_entreprise' => $this->getIdEntreprise(),

        ]);

      //  header("Location: ../../vue/PageAcceuilConnect.php");
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE email=:email and mdp=:mdp');
        $req->execute(array(
            "email" =>$this->getEmail(),
            "mdp" =>$this->getMdp(),
        ));
        $res = $req->fetch();
        if (is_array($res)){
            $this->setNom($res["nom"]);
            $this->setPrenom($res["prenom"]);
            $this->setRole($res["role"]);
            session_start();

            $_SESSION["utilisateur"] = $this;
            header("Location: ../../vue/PageAcceuilConnect.php");
        }else{
            header("Location: ../../vue/connexion.php");
        }
    }

    public function editer(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET id_utilisateur=:id_utilisateur,nom=:nom,prenom=:prenom,role=:role WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" =>$this->getIdUtilisateur(),
            "nom" =>$this->getNom(),
            "prenom" =>$this->getPrenom(),
            "role" =>$this->getRole(),
        ));

        if ($res){
            header("Location: ../../vue/accueil.php?success");
        }else{
            header("Location: ../../vue/editer.php?id_utilisateur=".$this->getIdUtilisateur()."&erreur");
        }
    }
    public function supprimer()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM utilisateur WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" => $this->getIdUtilisateur(),
        ));

        if ($res) {
            header("Location: ../../vue/accueil.php?success");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
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