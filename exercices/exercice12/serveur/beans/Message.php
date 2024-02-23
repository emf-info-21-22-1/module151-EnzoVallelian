<?php

/**
 * Classe Message
 *
 * Cette classe représente un message.
 *
 * @version 1.0
 * @author Neuhaus Olivier <neuhauso@edufr.ch>
 * @project Exercice du livre d'or
 */
class Message implements JsonSerializable{

    /**
     * Variable représentant l'auteur du message.
     * @access private
     * @var string
     */
    private $auteur;

    /**
     * Variable représentant le corps du message.
     * @access private
     * @var string
     */
    private $corps;

    /**
     * Constructeur de la classe Message
     *
     * @param string $auteur. L'auteur du message.
     * @param string $corps. Le corps du message.
     */
    public function __construct($auteur, $corps) {
        $this->auteur = $auteur;
		$this->corps = $corps;
    }

    /**
     * Fonction qui retourne l'auteur du message
     *
     * @return Le nom de l'auteur
     */
    public function GetAuteur() {
        return $this->auteur;
    }

     /**
     * Fonction qui retourne le corps du message
     *
     * @return le corps du message
     */
    public function GetCorps() {
        return $this->corps;
    }
	
	public function jsonSerialize() {
        return get_object_vars($this);
    }

}

?>