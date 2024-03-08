<?php

class Categorie
{
  private $id;
  private $categorie;

  public function __construct()
  {
   
  }

  public function getId()
  {
    return $this->id;
  }

  public function getCategorie()
  {
    return $this->categorie;
  }
  public function initFromDb($data) {
    $this->pk_user = $data["pk_categorie"];
    $this->categorie = $data["categorie"];
  
}
}
?>