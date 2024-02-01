<?php 
  /**
  * Classe Pays
  *
  * Cette classe représente un pays.
  *
  * @version 1.0
  * @author Neuhaus Olivier <neuhauso@edufr.ch>
  * @project Exercice 10 - debuggage
  */
  class Pays
  {
    /**
    * Variable représentant le nom du pays
    * @access private
    * @var string
    */
    private $nom;
    /**
    * Variable représentant la pk du pays
    * @access private
    * @var integer
    */
    private $pk_pays;

    /**
    * Constructeur de la classe Pays
    *
    * @param int $pk_pays. PK du pays
    * @param string nom. Nom du pays
    * @param int $dossardCoureur. Numéro de dossard du coureur
    */
    public function __construct($pk_pays, $nom)
    {
      $this->nom = $nom;
      $this->pk_pays = $pk_pays;    
    }
    
    /**
    * Fonction qui retourne le nom du pays.
    *
    * @return nom du pays.
    */
    public function getNom()
    {
      return $this->nom;
    }
    
    /**
    * Fonction qui retourne la pk du pays.
    *
    * @return pk du pays.
    */
    public function getPkPays()
    {
      return $this->pk_pays;
    }
    
    /**
    * Fonction qui retourne le contenu du bean au format XML
    * @return le contenu du bean au format XML
    */
    public function toXML()
    {
      $result = '<pays>';
      $result = $result . '<pk_pays>'.$this->getPkPays().'</pk_pays>';
      $result = $result . '<nom>'.$this->getNom().'</nom>';
      $result = $result . '</pays>';
      return $result;
    }
  }
?>