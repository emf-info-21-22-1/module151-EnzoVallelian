<?php

/**
 * Classe Skieur
 *
 * Cette classe représente un skieur.
 *
 * @version 1.0
 * @author Neuhaus Olivier <neuhauso@edufr.ch>
 * @project Exercice 10 - debuggage
 */
class Skieur {

  /**
   * Variable représentant le nom du skieur.
   * @access private
   * @var string
   */
  private $nom;

  /**
   * Variable représentant la position du skieur.
   * @access private
   * @var integer
   */
  private $position;

  /**
   * Variable représentant la pk du skieur.
   * @access private
   * @var integer
   */
  private $pk_skieur;

  /**
   * Constructeur de la classe beanEquipe
   *
   * @param int $pkCoureur. PK du skieur.
   * @param string $nomEquipe. Nom du skieur.
   * @param string $position. Position du skieur.
   */
  public function __construct($pkSkieur, $nom, $position) {
    $this->pk_skieur = $pkSkieur;
    $this->nom = $nom;
    $this->position = $position;
  }

  /**
   * Fonction qui retourne le nom du skieur
   *
   * @return nom du skieur
   */
  public function getNom() {
    return $this->nom;
  }

  /**
   * Fonction qui retourne la pk du skieur
   *
   * @return pk du skieur
   */
  public function getPk() {
    return $this->pk_skieur;
  }
  
   /**
   * Fonction qui retourne la position du skieur
   *
   * @return position du skieur
   */
  public function getPosition() {
    return $this->position;
  }
  
  /**
  * Fonction qui retourne le contenu du bean au format XML
  * @return le contenu du bean au format XML
  */
  public function toXML()
  {
    $result = '<skieur>';
    $result = $result . '<nom>'.$this->getNom().'</nom>';
    $result = $result . '<position>'.$this->getPosition().'</position>';
    $result = $result . '</skieur>';
    return $result;
  }

}

?>