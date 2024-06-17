<?php
include_once "Connexion.php";

class OptionManagerDB
{
    private $connexion;

    function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }
    public function getAllOptions()
    {
        $query = "SELECT * FROM t_option";
        return $this->connexion->selectQuery($query, []);
    }
    public function getOptionsByMotoId($motoId)
    {
        $query = "SELECT t_option.* 
                  FROM t_option
                  JOIN tr_moto_user_option 
                  ON t_option.pk_option = tr_moto_user_option.fk_option
                  WHERE tr_moto_user_option.fk_moto = :motoId";
        $params = array('motoId' => $motoId);
        return $this->connexion->selectQuery($query, $params);
    }

    // Ajoute d'autres méthodes en fonction des besoins de gestion des options
}
?>