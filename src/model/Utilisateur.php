<?php

class Utilisateur
{


    private $id_utilisateur;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $nom_promo;
    private $cv;
    private $motif_inscription;
    private $id_entreprise;
    private $secteur_activite;
    private $classe;
    private $specialite_prof;
    private $poste_entreprise;
    private $role;


    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * @param mixed $id_utilisateur
     */
    public function setIdUtilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
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
    public function getMotifInscription()
    {
        return $this->motif_inscription;
    }

    /**
     * @param mixed $motif_inscription
     */
    public function setMotifInscription($motif_inscription)
    {
        $this->motif_inscription = $motif_inscription;
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

    /**
     * @return mixed
     */


    public function inscription()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO utilisateur (nom, prenom, email, mdp, nom_promo, cv, motif_inscription, secteur_activite, classe, specialite_prof, poste_entreprise, role, id_entreprise) 
         VALUES (:nom, :prenom, :email, :mdp, :nom_promo, :cv, :motif_inscription, :secteur_activite, :classe, :specialite_prof, :poste_entreprise, :role, :id_entreprise)'
        );
        $req->execute([
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'email' => $this->getEmail(),
            'mdp' => $this->getMdp(),
            'nom_promo' => $this->getNomPromo(),
            'cv' => $this->getCv(),
            'motif_inscription' => $this->getMotifInscription(),
            'secteur_activite' => $this->getSecteurActivite(),
            'classe' => $this->getClasse(),
            'specialite_prof' => $this->getSpecialiteProf(),
            'poste_entreprise' => $this->getPosteEntreprise(),
            'role' => $this->getRole(),
            'id_entreprise' => $this->getIdEntreprise()
        ]);
        header("Location: ../../vue/page_ouverture.php?success=1");
    }

    public function connexion() {
        try {
            // Connexion à la base de données
            $bdd = new Bdd();

            // Préparation de la requête SQL
            $req = $bdd->getBdd()->prepare('SELECT * FROM `utilisateur` WHERE email = :email');

            // Exécution de la requête
            $req->execute(array(
                "email" => $this->getEmail()
            ));

            // Récupérer le résultat
            $res = $req->fetch();

            // Vérifier si un utilisateur a été trouvé et que le mot de passe est correct
            if ($res && is_array($res) && password_verify($this->getMdp(), $res["mdp"])) {
                // Démarrage de la session
                session_start();

                // Fonction pour stocker seulement les données non nulles dans la session
                $this->storeUserInSession($res);

                // Redirection vers la page d'accueil
                header("Location: ../../vue/pageaccueil.php");
                exit();
            } else {
                // Si l'utilisateur n'est pas trouvé ou le mot de passe est incorrect
                header("Location: ../../vue/page_ouverture.php?erreur=1");
                exit();
            }
        } catch (Exception $e) {
            // Gérer les erreurs (ex: problèmes de connexion à la BDD)
            echo "Une erreur s'est produite : " . $e->getMessage();
            exit();
        }
    }

    private function storeUserInSession($userData) {
        // Créer un tableau pour stocker les données utilisateur
        $userSessionData = [];

        // Stocker les données utilisateur uniquement si elles ne sont pas nulles
        if (!is_null($userData["id_utilisateur"])) $userSessionData["utilisateur_id"] = $userData["id_utilisateur"];
        if (!is_null($userData["nom"])) $userSessionData["utilisateur_nom"] = $userData["nom"];
        if (!is_null($userData["prenom"])) $userSessionData["utilisateur_prenom"] = $userData["prenom"];
        if (!is_null($userData["email"])) $userSessionData["utilisateur_email"] = $userData["email"];
        if (!is_null($userData["role"])) $userSessionData["utilisateur_role"] = $userData["role"];
        if (!is_null($userData["nom_promo"])) $userSessionData["utilisateur_nom_promo"] = $userData["nom_promo"];
        if (!is_null($userData["classe"])) $userSessionData["utilisateur_classe"] = $userData["classe"];
        if (!is_null($userData["cv"])) $userSessionData["utilisateur_cv"] = $userData["cv"];
        if (!is_null($userData["motif_inscription"])) $userSessionData["utilisateur_motif_inscription"] = $userData["motif_inscription"];
        if (!is_null($userData["poste_entreprise"])) $userSessionData["utilisateur_poste_entreprise"] = $userData["poste_entreprise"];
        if (!is_null($userData["secteur_activite"])) $userSessionData["utilisateur_secteur_activite"] = $userData["secteur_activite"];
        if (!is_null($userData["specialite_prof"])) $userSessionData["utilisateur_specialite_prof"] = $userData["specialite_prof"];
        if (!is_null($userData["id_entreprise"])) $userSessionData["utilisateur_id_entreprise"] = $userData["id_entreprise"];

        // Stocker les données dans la session
        $_SESSION["utilisateur"] = $userSessionData;
    }




    public function editer()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,role=:role WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" => $this->getIdutilisateur(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "role" => $this->getRole(),
        ));

        if ($res) {
            header("Location: ../../vue/annuiare_anciens_eleves.php?success");
        } else {
            header("Location: ../../vue/editer.php?id_utilisateur=" . $this->getIdutilisateur() . "&erreur");
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
            header("Location: ../../vue/annuiare_anciens_eleves.php?success");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
    }

    public function afficherNom()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT nom FROM `utilisateur` WHERE nom=:nom');
        $req->execute(array(
            "nom" => $this->getNom()

        ));
    }

}