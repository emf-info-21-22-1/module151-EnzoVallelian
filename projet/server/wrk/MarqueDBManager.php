<?php

include_once "Connexion.php";

class MarqueDBManager
{
    private $connexion;

    function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }

    /**
     * Récupère toutes les marques.
     *
     * @return array Tableau des marques
     */
    public function getAllMarques()
    {
        $query = "SELECT * FROM t_marque";
        return $this->connexion->selectQuery($query, []);
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des marques
}

?>
