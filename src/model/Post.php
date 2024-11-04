<?php



class Post
{

private $ref_utilisateur;
private $ref_forum;

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

    public function getDetails($postId)
    {
    }


}