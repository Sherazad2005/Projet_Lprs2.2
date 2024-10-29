<?php

namespace model;

class Reponse1
{
private $ref_utilisateur;
private $ref_reponse;

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
    public function getRefReponse()
    {
        return $this->ref_reponse;
    }

    /**
     * @param mixed $ref_reponse
     */
    public function setRefReponse($ref_reponse)
    {
        $this->ref_reponse = $ref_reponse;
    }


}