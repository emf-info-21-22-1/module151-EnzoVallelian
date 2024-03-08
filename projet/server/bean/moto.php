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
  }

}


?>