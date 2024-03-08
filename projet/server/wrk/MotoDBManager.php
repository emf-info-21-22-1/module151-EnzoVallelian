<?php
class MotoDBManager
{
    private $connexion;

    public function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }
    /**public function getCarFromDB()
	{
		$query = "SELECT c.*, b.brand
              FROM db_151.t_car c
              LEFT JOIN db_151.t_brand b ON c.fk_brand = b.pk_brand";
		$params = array();
		$response = $this->connexion->selectQuery($query, $params);
		$cars = array();
		foreach ($response as $carData) {
			$car = new Car();
			$car->initFromDb($carData);
			$cars[] = array(
				'pk_car' => $car->getPKCar(),
				'brand' => $car->getBrand(),
				'model' => $car->getModel(),
				'price' => $car->getPrice()
			);
		}
		$result = json_encode(
			array(
				'success' => true,
				'message' => 'Opération réussie.',
				'cars' => $cars
			)
		);
		return $result;
	} */
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