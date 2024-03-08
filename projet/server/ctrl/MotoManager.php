<?php
include_once 'wrk/MotoDBManager.php';
class MotoManager
{
    
  private $manager;
  public function __construct()
  {
    $this->manager = new MotoDBManager();
    
  }

  public function getAllMoto()
  {

    

    return $this->manager->getAllMoto();

  }
}
?>