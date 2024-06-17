<?php

include_once "Connexion.php";

class CategorieDBManager
{
    private $connexion;

    function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }

    /**
     * Récupère toutes les catégories.
     *
     * @return array Tableau des catégories
     */
    public function getAllCategories()
    {
        $query = "SELECT * FROM t_categorie";
      
        
        return $this->connexion->selectQuery($query, []);
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des catégories
}

?>
