/*
 * Bean "Equipe".
 *
 * @author Neuhaus Olivier
 * @project Exercice 5
 * @version 1.0 / 13-SEP-2013
 */

/**
 * Bean Equipe
 * @returns {Equipe}
 */
var Equipe = function() {
};

/**
 * Setter pour le nom de l'équipe
 * @param String nom
 */
Equipe.prototype.setNom = function(nom) {
  this.nom = nom;
};

/**
 * Setter pour le pk de l'équipe
 * @param Integer pk
 */
Equipe.prototype.setPk = function(pk) {
  this.pk = pk;
};

/**
 * Retourne l'équipe en format texte
 * @returns L'équipe en format texte
 */
Equipe.prototype.toString = function () {
  return this.nom;
};

/**
 * Retourne la pk de l'équipe
 * @returns La pk de l'équipe
 */
Equipe.prototype.getPk = function () {
  return this.pk;
};


