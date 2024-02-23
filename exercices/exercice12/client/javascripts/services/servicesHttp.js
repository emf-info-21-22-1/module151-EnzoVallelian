/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 13-SEP-2013
 */

var BASE_URL = "../serveur/main.php";

/**
 * Fonction permettant de demander la liste des pays au serveur.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerMessages(successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: BASE_URL,
    success: successCallback,
    error: errorCallback
  });
}

/**
 * Fonction permettant d'ajouter un message.
 * @param auteur. Auteur ajoutant le message.
 * @param message. Message à ajouter.
 * @param successCallback Fonction de callback lors du retour avec succès de l'appel.
 * @param errorCallback Fonction de callback en cas d'erreur.
 */
function ajouterMessage(auteur, message, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    dataType: "json",
    url: BASE_URL,
    data:'action=AjouterMessage&auteur=' + auteur + '&message=' + message,
    success: successCallback,
    error: errorCallback
  });
}

