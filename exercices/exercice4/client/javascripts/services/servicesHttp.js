/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

var BASE_URL = "mettez ici l'adresse du PHP que vous souhaitez appeler";

/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerTeam(successCallback, errorCallback) {
    $.ajax({
    type: "GET",
    dataType: "xml",
    url: BASE_URL,
    success: successCallback,
    error: errorCallback
    });
}