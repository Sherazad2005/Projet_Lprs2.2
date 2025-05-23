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
    private $ref_emplois;


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
    public function getRefEmplois()
    {
        return $this->ref_emplois;
    }

    /**
     * @param mixed $ref_emplois
     */
    public function setRefEmplois($ref_emplois)
    {
        $this->ref_emplois = $ref_emplois;
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
        if ($req) {
            header("Location: ../../vue/page_ouverture.php");
        } else {
            header("Location: ../../vue/Contact.php?id_utilisateur=" . $this->getIdUtilisateur(). "&erreur");
        }
    }
    public function connexion()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('
        SELECT u.*, e.nom AS nom_entreprise 
        FROM utilisateur u 
        LEFT JOIN entreprise e ON u.id_entreprise = e.id_entreprise 
        WHERE u.email = :email
    ');
        $req->execute(array("email" => $this->getEmail()));
        $res = $req->fetch();

        if ($res && is_array($res)) {
            // Vérification du mot de passe
            if (password_verify($this->getMdp(), $res["mdp"])) {
                if ($res['validated'] == 1) {
                    // Récupération des informations de l'utilisateur
                    $this->setIdUtilisateur($res["id_utilisateur"]);
                    $this->setNom($res["nom"]);
                    $this->setPrenom($res["prenom"]);
                    $this->setEmail($res["email"]);
                    $this->setRole($res["role"]);

                    // Gestion des champs pouvant être NULL
                    $this->setCv($res["cv"] ?? null);
                    $this->setClasse($res["classe"] ?? null);
                    $this->setNomPromo($res["nom_promo"] ?? null);
                    $this->setIdEntreprise($res["id_entreprise"] ?? null);
                    $this->setPosteEntreprise($res["poste_entreprise"] ?? null);
                    $this->setSpecialiteProf($res["specialite_prof"] ?? null);
                    $this->setRefEmplois($res["ref_emplois"] ?? null);
                    $this->setMotifInscription($res["motif_inscription"] ?? null);
                    $this->setSecteurActivite($res["secteur_activite"] ?? null);

                    session_start();
                    $_SESSION["utilisateur"] = $this; // Enregistre l'objet utilisateur dans la session

                    // Stocke le nom de l'entreprise si disponible
                    $_SESSION['nom_entreprise'] = $res['nom_entreprise'] ?? 'Non défini';

                    // Redirection en fonction du rôle
                    switch ($this->getRole()) {
                        case 'alumni':
                            header("Location: ../../vue/alumni.php");
                            break;
                        case 'professeur':
                            header("Location: ../../vue/professeur.php");
                            break;
                        case 'partenaire':
                            header("Location: ../../vue/entreprise.php");
                            break;
                        case 'eleve':
                            header("Location: ../../vue/etudiants.php");
                            break;
                        case 'gestionnaire':
                            header("Location: ../../vue/gestionnaire.php");
                            break;
                        default:
                            header("Location: ../../vue/pageacceuil.php");
                            break;
                    }
                    exit; // Arrêt du script après la redirection
                } else {
                    // Compte non validé
                    header("Location: ../../vue/page_ouverture.php?erreur=3");
                    exit;
                }
            } else {
                // Mot de passe incorrect
                header("Location: ../../vue/page_ouverture.php?erreur=2");
                exit;
            }
        } else {
            // Utilisateur non trouvé
            header("Location: ../../vue/page_ouverture.php?erreur=1");
            exit;
        }
    }


    public function editer()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,email=:email WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" => $this->getIdutilisateur(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "email" => $this->getEmail(),
        ));

        if ($res) {
            header("Location: ../../vue/liste_utilisateur.php?success");
        } else {
            header("Location: ../../vue/editer.php?id_utilisateur=" . $this->getIdutilisateur() . "&erreur");
        }
    }
    public function editer1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET nom=:nom,prenom=:prenom,email=:email WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" => $this->getIdutilisateur(),
            "nom" => $this->getNom(),
            "prenom" => $this->getPrenom(),
            "email" => $this->getEmail(),
        ));

        if ($res) {
            header("Location: ../../vue/editer.php?success");
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
            header("Location: ../../vue/liste_utilisateur.php?success");
        } else {
            header("Location: ../../vue/connexion.php?erreur");
        }
    }

    public function supprimer1()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('DELETE FROM utilisateur WHERE id_utilisateur=:id_utilisateur');
        $res = $req->execute(array(
            "id_utilisateur" => $this->getIdUtilisateur(),
        ));

        if ($res) {
            header("Location: ../../vue/annuiare_anciens_eleves_prof.php?success");
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

    public function oubliemdp()
    {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('UPDATE utilisateur SET mdp = :mdp WHERE email = :email');
        $res = $req->execute(array(
            "email" => $this->getEmail(),
            "mdp" => $this->getMdp(),
        ));

        if ($res) {
            header("Location: ../../vue/page_ouverture.php?success=1");
        } else {
            header("Location: ../../vue/OubliMDP.php?erreur=1");
        }
    }
}
?>