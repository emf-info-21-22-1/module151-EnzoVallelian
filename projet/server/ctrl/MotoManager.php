<?php
include_once 'wrk/MotoDBManager.php';

class MotoManager
{

  private $manager;
  public function __construct()
  {
    $this->manager = new MotoDBManager();
    
  }
  public function getAllMoto($username)
  {
   
    
    return $this->manager->getAllMoto();
  }
  public function getAllMotoByUser($userId)
  {
    return $this->manager->getAllMotoByUser($userId);
  }
  public function addMoto($cc, $hp, $weight,  $name)
  {
      return $this->manager->addMoto($cc, $hp, $weight, $name);
  }
  
}
?>