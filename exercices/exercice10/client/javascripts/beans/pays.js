/*
 * Bean "Pays".
 *
 * @author Neuhaus Olivier
 * @project Test sommatif 1 2013
 * @version 1.0 / 13-SEP-2013
 */

var Pays = function() {
};

/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Pays.prototype.setNom = function(nom) {
  this.nom = nom;
};

/**
 * Setter pour le pk du pays
 * @param String nom
 * @returns {undefined}
 */
Pays.prototype.setPk = function(pk) {
  this.pk = pk;
};

/**
 * Retourne le pays en format texte
 * @returns Le pays en format texte
 */
Pays.prototype.toString = function () {
  return this.nom;
};

