<?php

class Avis {

    private $_id;
    private $_gout;
    private $_diversite;
    private $_chaleur;
    private $_commentaire;


    public function __construct(array $ligne=null)
    {
        $this->hydrate($ligne);
    }


    public function hydrate(?array $ligne)
    {
        foreach ($ligne as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of _email
     */ 
    public function getGout()
    {
        return $this-> _gout;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    public function setGout($_gout)
    {
        $this->_gout = $_gout;

        return $this;
    }

    /**
     * Get the value of _password
     */ 
    public function getDiversite()
    {
        return $this->_diversite;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    public function setDiversite($_diversite)
    {
        $this->_diversite = $_diversite;

        return $this;
    }

    /**
     * Get the value of _role
     */ 
    public function getChaleur()
    {
        return $this->_chaleur;
    }

    /**
     * Set the value of _role
     *
     * @return  self
     */ 
    public function setChaleur($_chaleur)
    {
        $this->_chaleur = $_chaleur;

        return $this;
    }

    /**
     * Get the value of _role
     */ 
    public function getCommentaire()
    {
        return $this->_commentaire;
    }

    /**
     * Set the value of _role
     *
     * @return  self
     */ 
    public function setCommentaire($_commentaire)
    {
        $this->_commentaire = $_commentaire;

        return $this;
    }

    /**
     * Get the value of _id
     */ 
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set the value of _id
     *
     * @return  self
     */ 
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }
}