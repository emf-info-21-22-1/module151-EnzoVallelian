/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 20-SEP-2013
 */

/**
 * Méthode appelée lors du retour avec succès du résultat
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerTeamSuccess(data, text, jqXHR) {
    // appelé lorsque l'on reçoit les données de la part du PHP
	var tblContent = $("#tableContent");
    var txt = '';
    
    $(data).find("equipe").each(function() {
        alert($(this).find("nom").text());
        txt = "<tr><td>" + $(this).find("id").text() + "</td><td>" + $(this).find("nom").text() + "</td></tr>";
        $(txt).appendTo(tblContent);
    })
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture du webservice
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 */
function chargerTeamError(request, status, error) {
	// appelé s'il y a une erreur lors du retour
    alert("erreur : " + error + ", request: " + request + ", status: " + status);
}

/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function() {
    var butLoad = $("#displayTeams");
    $.getScript("javascripts/services/servicesHttp.js", function() {
        console.log("servicesHttp.js chargé !");
    });
    butLoad.click(function(event) {
        chargerTeam(chargerTeamSuccess, chargerTeamError);
    });
});

