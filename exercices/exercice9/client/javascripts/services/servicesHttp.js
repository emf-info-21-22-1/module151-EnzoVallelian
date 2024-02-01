/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

var BASE_URL = "http://localhost/EXERCICE%206/PartieServeur/serveur.php";

/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerPersonnel(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "xml",
        url: BASE_URL,
        data: 'action=getInfos',
        success: successCallback,
        error: errorCallback
    });
}


/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function connect(passwd, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "xml",
        url: BASE_URL,
        data: 'action=connect&password=' + passwd,
        success: successCallback,
        error: errorCallback
    });
}

/**
 * Fonction permettant de charger les données d'équipe.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function disconnect(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "xml",
        url: BASE_URL,
        data: 'action=disconnect',
        success: successCallback,
        error: errorCallback
    });
}