<?php

class AvisManager {
    private $_db;

    public function __construct(PDO $db){
        $this->setDB($db);
    }

    public function setDB(PDO $db): AvisManager {
        $this->_db = $db;
        return $this;
    }

    public function getList():array {
        $listeAvis = array();
        //Retourne la liste de tous les pers
        $request = $this->_db->query('SELECT * FROM avis_plats;');
        while ($ligne = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée 
        {
            $avis = new Avis($ligne);
            $listeAvis[] = $avis;
        }
        return $listeAvis;
    }

}