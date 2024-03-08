<?php

class Marque {
  private $id;
  private $nom;

  public function __construct() {
     
  }

  public function getId() {
      return $this->id;
  }

  public function getNom() {
      return $this->nom;
  }
  public function initFromDb($data) {
    $this->pk_marque = $data["pk_marque"];
    $this->Nom = $data["Nom"];
    
}
}

?>