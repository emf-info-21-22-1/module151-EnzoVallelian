<?php
require_once('wrk/EquipesDBManager.php');
require_once('wrk/JoueursDBManager.php');
class JoueurCtrl{
  
  private $manager;
  
  public function __construct(){
    $this->manager = new JoueursDBManager();
  }
  
  public function getJoueursXML($equipeID){
    $joueurs = $this->manager->getJoueurs($equipeID);
    $result = '<joueurs>';
    foreach($joueurs as $joueur){
      $result = $result . '<joueur>' . '<id>' . $joueur->getId() . '</id>' . '<nom>' . $joueur->getNom() . '</nom>' . '<points>' . $joueur->getPoints() . '</points>' . '</joueur>';
    }
    $result = $result . '</joueurs>';
    return $result;
  }
  

}

?>