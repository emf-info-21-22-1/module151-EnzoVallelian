<?php

class Moto
{
  private $pk_moto;
  private $modele;
  private $cc;
  private $hp;
  private $weight;
  private $price;
  private $fk_marque;
  private $fk_categorie;
  private $name;

  public function __construct()
  {
  }

  public function initFromDb($data)
  {
    $this->pk_moto = $data["pk_moto"];
    $this->cc = $data["cc"];
    $this->hp = $data["hp"];
    $this->weight = $data["weight"];
    $this->fk_marque = $data["fk_marque"];
    $this->fk_categorie = $data["fk_categorie"];
    $this->name = $data["name"];
  }
  public function getPk_moto() {
    return $this->pk_moto;
  }

  public function getcc() {
    return $this->cc;

  }
  public function gethp() {
    return $this->hp;
  }

  public function getWeight() {
    return $this->weight;
  }
  public function getfk_marque() {
    return $this->fk_marque;
  }

  public function getfk_categorie() {
    return $this->fk_categorie;
  
  }
  public function getName() {
    return $this->name;
  
  }

}


?>