<?php
include_once 'wrk/MotoDBManager.php';

class MotoManager
{
  private $session;
  private $manager;
  public function __construct($session)
  {
    $this->manager = new MotoDBManager();
    $this->session = $session;
  }
  public function getAllMoto($username)
  {
   
    
    return $this->manager->getAllMoto();
  }
  public function getAllMotoByUser($userId)
  {
    return $this->manager->getAllMotoByUser($userId);
  }
  public function addMoto($cc, $hp, $weight, $fk_marque, $fk_categorie, $name)
  {
    return $this->manager->addMoto($cc, $hp, $weight, $fk_marque, $fk_categorie, $name);
  }
  /*
  public function addMoto2($make, $model, $year) {
    $this->dbManager->addMoto($make, $model, $year);
}

  */
}
?>