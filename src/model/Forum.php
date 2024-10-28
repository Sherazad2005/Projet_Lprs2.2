<?php

namespace model;

class Forum
{
    private $ifForum ;
    private $titre ;
    private $messages ;
    private $date_messages ;
    private $heure_messages ;
    private $canal ;

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
    public function getIfForum()
    {
        return $this->ifForum;
    }

    /**
     * @param mixed $ifForum
     */
    public function setIfForum($ifForum)
    {
        $this->ifForum = $ifForum;
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
        return $this->date_messages;
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
        return $this->heure_messages;
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

    public function ajouterUnForum() {
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare(
            'INSERT INTO forum (titre, messages, date_messages, heure_messages, canal) 
         VALUES (:titre, :messages, :CURRENT_DATE, CURRENT_TIME, :canal)'
        );

        $req->execute([
            'titre' => $this->getTitre(),
            'messages' => $this->getMessages(),
            'date_messages' => $this->getDateMessages(),
            'heure_messages' => $this->getHeureMessages(),
            'canal' => $this->getCanal(),
        ]);

        header("Location: ../../vue/inscription.php?success"); // Redirection après succès
    }



}