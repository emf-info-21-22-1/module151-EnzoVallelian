<?php
include_once "wrk/OptionManager.php";

class OptionManager
{
    private $wrk;
    private $manager;
    function __construct()
    {
        $this->manager = new OptionManagerDB();
    }

    public function getAllOptions()
    {
        return $this->manager->getAllOptions();
    }

    public function getOptionsByMotoId($motoId)
    {
        return $this->manager->getOptionsByMotoId($motoId);
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des options
}
?>
