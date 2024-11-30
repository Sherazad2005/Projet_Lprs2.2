<?php



class Reponse
{

    private $id_reponse;
    private $messages ;
    private $date_messages;
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
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * @param mixed $messages
     */
    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    /**
     * @return mixed
     */
    public function getDateMessages()
    {
        return  date("d/m/Y");
    }

    /**
     * @param mixed $date_messages
     */
    public function setDateMessages($date_messages)
    {
        $this->date_messages = $date_messages;
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


    public function ajouterUneReponse() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO reponse (messages, date_messages, heure_message,	ref_forum, ref_utilisateur) 
                    VALUES (:messages, CURRENT_DATE(), CURRENT_TIME(), :ref_forum, :ref_utilisateur)');

        $req->execute([
            'messages' => $this->getMessages(),
            'ref_forum' => $_SESSION[""],
            'ref_utilisateur' => $_SESSION[""]
        ]);

        header("Location: ../../vue/PageForumEleve.php?success");
    }

}