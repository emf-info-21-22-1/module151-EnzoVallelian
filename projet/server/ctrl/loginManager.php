<?php
require_once('wrk/EquipesDBManager.php');
class EquipeCtrl{
  
  private $manager;  
  public function __construct(){
    $this->manager = new EquipesDBManager();
  } 
  public function getEquipesXML(){
    $equipes = $this->manager->getEquipes();
    $result = "<equipes>";
    foreach($equipes as $equipe){
      $result = $result . "<equipe>" . "<id>" 
	  . $equipe->getId() . "</id>" . "<nom>" 
	  . $equipe->getNom() . "</nom>" . "</equipe>";
    }
    $result = $result . "</equipes>";
    return $result;
  }
  

}

?>