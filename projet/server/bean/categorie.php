<?php

class Categorie
{
  private $id;
  private $categorie;

  public function __construct($id, $categorie)
  {
    $this->id = $id;
    $this->categorie = $categorie;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getCategorie()
  {
    return $this->categorie;
  }
}
?>