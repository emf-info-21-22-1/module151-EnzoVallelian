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

  public function __construct($pk_moto, $modele, $cc, $hp, $weight, $price, $fk_marque, $fk_categorie)
  {
    $this->modele = $modele;

    $this->cc = $cc;
    $this->hp = $hp;
    $this->weight = $weight;
    $this->price = $price;
    $this->fk_marque = $fk_marque;
    $this->fk_categorie = $fk_categorie;
  }


  public function afficherInfos()
  {

    echo "Modèle: $this->modele\n";



    echo "Cylindrée: $this->cc cc\n";
    echo "Puissance: $this->hp hp\n";
    echo "Poids: $this->weight kg\n";
    echo "Prix: $this->price €\n";
    echo "Clé étrangère marque: $this->fk_marque\n";
    echo "Clé étrangère catégorie: $this->fk_categorie\n";
  }
}

// Exemple d'utilisation
$moto = new Moto(10, "MT-07", 700, 75, 180, 9000, 1, 1);

$moto->afficherInfos();

$moto->afficherInfos();

$moto->afficherInfos();

?>