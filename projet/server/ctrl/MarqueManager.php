<?php

include_once "wrk/MarqueDBManager.php";

class MarqueManager
{
    private $wrk;

    public function __construct()
    {
        // Crée une instance de MarqueDBManager
        $this->wrk = new MarqueDBManager();
    }

    /**
     * Récupère toutes les marques.
     *
     * @return array Tableau des marques
     */
    public function getAllMarques()
    {
        // Appelle la méthode pour récupérer toutes les marques
        return $this->wrk->getAllMarques();
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des marques
}

?>
