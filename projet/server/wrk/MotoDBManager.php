<?php

include_once('bean/moto.php');
class MotoDBManager
{
    private $connexion;
   
    public function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }
    
    public function getAllMoto()
    {
        
        $query = "SELECT * FROM t_moto";
        echo $query;
        echo "ads";

        $params = array();
        $response = $this->connexion->selectQuery($query, $params);
        $motos = array();
        foreach ($response as $motoData) {
            $moto = new Moto();
            $moto->initFromDb($motoData);
            $motos[] = array(
                'pk_moto' => $moto->getPk_moto(),
                'cc' => $moto->getcc(),
                'hp' => $moto->gethp(),
                'weight' => $moto->getWeight(),
                'fk_marque' => $moto->getfk_marque(),
                'fk_categorie' => $moto->getfk_categorie()
            );
        }
        $result = json_encode(
            array(
                'success' => true,
                'message' => 'Opération réussie.',
                'moto' => $motos
            )
        );
       
        return $result;
    }
}