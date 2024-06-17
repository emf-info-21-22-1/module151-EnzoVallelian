<?php

include_once "wrk/CategorieDBManager.php";

class CategorieManager
{
    private $manager;


    public function __construct()
    {
        // Crée une instance de CategorieDBManager
        $this->manager = new CategorieDBManager();
    }

    /**
     * Récupère toutes les catégories.
     *
     * @return array Tableau des catégories
     */
    public function getAllCategories()
    {
        // Appelle la méthode pour récupérer toutes les catégories depuis le WRK
        
        return $this->manager->getAllCategories();
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des catégories
}

?>
