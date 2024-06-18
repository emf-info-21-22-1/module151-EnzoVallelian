<?php

include_once ('bean/moto.php');
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
        // echo $query;


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
                'fk_categorie' => $moto->getfk_categorie(),
                "name" => $moto->getName()
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



    public function getAllMotoByUser($userId)
    {
        // Modifier la requête SQL pour sélectionner les motos associées à un utilisateur
        $query = "SELECT * FROM t_moto WHERE fk_user = ?";

        $params = array($userId);
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
        echo $result;
        return $result;
    }

    public function addMoto($cc, $hp, $weight, $fk_marque, $fk_categorie, $name)
    {
        if (empty($cc) || empty($hp) || empty($weight) || empty($fk_marque) || empty($fk_categorie) || empty($name)) {
            return json_encode(
                array(
                    'success' => false,
                    'message' => 'Tous les champs doivent être renseignés'
                ),
                JSON_UNESCAPED_UNICODE
            );
        }

        $query = "INSERT INTO t_moto (cc, hp, weight, fk_marque, fk_categorie, name) VALUES (:cc, :hp, :weight, :fk_marque, :fk_categorie, :name)";
        $insertParams = array(':cc' => $cc, ':hp' => $hp, ':weight' => $weight, ':fk_marque' => $fk_marque, ':fk_categorie' => $fk_categorie, ':name' => $name);
        $insertResult = $this->connexion->executeQuery($query, $insertParams);

        if ($insertResult === true) {
            $lastInsertedId = $this->connexion->getLastId('t_moto');
            return json_encode(
                array(
                    'success' => true,
                    'message' => 'Moto ajoutée avec succès',
                    "moto" => array(
                        "pk_moto" => $lastInsertedId
                    )
                ),
                JSON_UNESCAPED_UNICODE
            );
        } else {
            return json_encode(
                array(
                    'success' => false,
                    'message' => 'Erreur lors de l\'ajout de la moto'
                ),
                JSON_UNESCAPED_UNICODE
            );
        }
    }


}
?>