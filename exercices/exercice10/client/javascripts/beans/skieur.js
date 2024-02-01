/*
 * Bean "Skieur".
 *
 * @author Neuhaus Olivier
 * @project Test sommatif 1 2013
 * @version 1.0 / 13-SEP-2013
 */

/**
 * Bean Skieur
 * @returns {Continent}
 */
var Skieur = function() {
};

/**
 * Setter pour le nom du skieur
 * @param String nom
 */
Skieur.prototype.setNom = function(nom) {
  this.nom = nom;
};

/**
 * Setter pour la position du skieur
 * @param Integer nom
 */
Skieur.prototype.setPosition = function(position) {
  this.position = position;
};

/**
 * Retourne le skieur en format texte
 * @returns Le skieur en format texte
 */
Skieur.prototype.toString = function () {
  return this.nom;
};

/**
 * Getter pour la position du skieur
 * @returns La position du skieur
 */
Skieur.prototype.getPosition = function() {
  return this.position;
};