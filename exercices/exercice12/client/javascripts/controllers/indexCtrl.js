/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 02.01.2018
 */

/**
 * Méthode appelée lors du retour avec succès de la liste des messages
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 * @returns {undefined}
 */
function chargerMessagesSuccess(data, text, jqXHR)
{   
    var txt = '';
	var messages = data['messages'];
    for (var i = 0; i < messages.length; i++) {
		var auteur = messages[i]["auteur"];
		var corps = messages[i]["corps"]; 
		$('#tableContent').append("<tr><td>" + auteur + "</td><td>" + corps + "</td></tr>");
	}
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture des messages
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */
function chargerMessagesError(request, status, error) {
  alert("Erreur lors de la lecture des messages: " + error);
}

/**
 * Méthode appelée lors du retour avec succès de l'ajout d'un message
 */
function addMessagesSuccess(data, text, jqXHR)
{   
    var txt = data['result'];
    if(txt)
	{
		location.reload();
	}
	else{
		alert("Erreur lors de l'ajout");
	}	
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture des messages
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */
function addMessagesError(request, status, error) {
  alert("Erreur lors de l'ajout du message: " + error);
}

/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function() {
  $.getScript("javascripts/helpers/dateHelper.js", function() {
    console.log("dateHelper.js chargé !");
  });
  $.getScript("javascripts/services/servicesHttp.js", function() {
    console.log("servicesHttp.js chargé !");
    chargerMessages(chargerMessagesSuccess, chargerMessagesError);
  });
  $("#ajouter").click(function(){ 
	var auteur = document.getElementById("txtAuteur").value;
	var message = document.getElementById("txtMessage").value;
	ajouterMessage(auteur, message, addMessagesSuccess, addMessagesError);
  });
});

