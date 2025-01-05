<?php

class Forum
{
    private $id_Forum ;
    private $titre ;
    private $messages ;
    private $date_messages ;
    private $heure_messages ;
    private $canal ;
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
    public function getIdForum()
    {
        return $this->id_Forum;
    }

    /**
     * @param mixed $id_Forum
     */
    public function setIdForum($id_Forum)
    {
        $this->id_Forum = $id_Forum;
    }



    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
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
    public function getHeureMessages()
    {
        return time();
    }

    /**
     * @param mixed $heure_messages
     */
    public function setHeureMessages($heure_messages)
    {
        $this->heure_messages = $heure_messages;
    }

    /**
     * @return mixed
     */
    public function getCanal()
    {
        return $this->canal;
    }

    /**
     * @param mixed $canal
     */
    public function setCanal($canal)
    {
        $this->canal = $canal;
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



    public function ajouterUnForum() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO forum (titre, messages, date_messages, heure_messages, canal, ref_utilisateur)
                    VALUES (:titre, :messages, CURRENT_DATE(), CURRENT_TIME(), :canal, :ref_utilisateur)');

        $req->execute([
            'titre' => $this->getTitre(),
            'messages' => $this->getMessages(),
            'canal' => $this->getCanal(),
            'ref_utilisateur' => $_SESSION[""]
        ]);

        header("Location: ../../vue/NewForum.php?success");
    }
    public function getAllPosts() {
        $query = "SELECT id_forum, titre, LEFT(contenu, 100) AS extrait, date_creation FROM posts ORDER BY date_creation DESC";

        $statement = $this->bdd->prepare($query);
        $statement->execute();


        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function afficherPost() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'SELECT * FROM forum WHERE id_forum = :id_forum');
        $req->execute(array(
            'id_forum' =>$this->getIdForum()
        ));

    }

}