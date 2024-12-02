
<?php

session_start();
var_dump($_SESSION);
class Reponse
{

    private $id_reponse;
    private $message ;
    private $date_message;
    private $heure_message;
    private $ref_forum;
    private $ref_utilisateur ;

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
    public function getIdReponse()
    {
        return $this->id_reponse;
    }

    /**
     * @param mixed $id_reponse
     */
    public function setIdReponse($id_reponse)
    {
        $this->id_reponse = $id_reponse;
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

    /**
     * @return mixed
     */
    public function getDateMessage()
    {
        return  date("d/m/Y");
    }

    /**
     * @param mixed $date_message
     */
    public function setDateMessage($date_message)
    {
        $this->date_message = $date_message;
    }

    /**
     * @return mixed
     */
    public function getHeureMessage()
    {
        return time();
    }

    /**
     * @param mixed $heure_message
     */
    public function setHeureMessage($heure_message)
    {
        $this->heure_message = $heure_message;
    }

    /**
     * @return mixed
     */
    public function getRefForum()
    {
        return $this->ref_forum;
    }

    /**
     * @param mixed $ref_forum
     */
    public function setRefForum($ref_forum)
    {
        $this->ref_forum = $ref_forum;
    }

    /**
     * @return mixed
     */
    public function getRefUtilisateur()
    {
        return $this->ref_utilisateur;
    }

    /**
     * @param mixed $ref_utilisateur
     */
    public function setRefUtilisateur($ref_utilisateur)
    {
        $this->ref_utilisateur = $ref_utilisateur;
    }


    public function ajouterUneReponse($id_forum) {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO reponse (message, date_message, heure_message,	ref_forum, ref_utilisateur) 
                    VALUES (:message, CURRENT_DATE(), CURRENT_TIME(), :ref_forum, :ref_utilisateur)');

        $req->execute([
            'message' => $this->getMessage(),
            'ref_forum' => $id_forum,
            'ref_utilisateur' => $_SESSION['id_utilisateur']
        ]);

        header("Location: ../../vue/PageForumEleve.php?success");
    }

}