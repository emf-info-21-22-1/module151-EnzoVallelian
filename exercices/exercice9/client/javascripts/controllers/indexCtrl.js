/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

/**
 * Méthode appelée lors du retour avec succès du résultat des équipes
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerPersonnelSuccess(data, text, jqXHR) {
    var cmbPersonnel = document.getElementById("cmbPersonnel");
    cmbPersonnel.options.length = 0;
	
	if ($(data).find("message").text() !== '')
	{
		alert ($(data).find("message").text());
	}
	else{
		$(data).find("user").each(function() {		
			cmbPersonnel.options[cmbPersonnel.options.length] = new Option($(this).find("name").text() + " - " + $(this).find("salaire").text());
		});
	}
}

function connectSuccess(data, text, jqXHR) {
    var cmbPersonnel = document.getElementById("cmbPersonnel");
    cmbPersonnel.options.length = 0;
    if ($(data).find("result").text() == 'true')
	{
		alert("Login ok");
		chargerPersonnel(chargerPersonnelSuccess, CallbackError);
	}
	else{
		alert("Erreur lors du login");
	}

}

function disconnectSuccess(data, text, jqXHR) {
    alert("Utilisateur déconnecté");
	chargerPersonnel(chargerPersonnelSuccess, CallbackError);
}


/**
 * Méthode appelée en cas d'erreur lors de la lecture du webservice
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function CallbackError(request, status, error) {
    alert("erreur : " + error + ", request: " + request + ", status: " + status);
}

/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function() {
    var butConnect = $("#connect");
	var butDisconnect = $("#disconnect");
    var cmbPersonnel = $("#cmbPersonnel");
	var txtLogin = document.getElementById("txtLogin").value;
	
    $.getScript("javascripts/services/servicesHttp.js", function() {
        console.log("servicesHttp.js chargé !");
        chargerPersonnel(chargerPersonnelSuccess, CallbackError);
    });
	
	butConnect.click(function(event) {
        connect(document.getElementById("txtLogin").value, connectSuccess, CallbackError);
    });
	butDisconnect.click(function(event) {
        disconnect(disconnectSuccess, CallbackError);
    });
});

