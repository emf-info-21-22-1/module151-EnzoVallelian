/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 13-SEP-2013
 */

/**
 * Méthode appelée lors du retour avec succès de la liste des pays
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 * @returns {undefined}
 */
function chargerPaysSuccess(data, text, jqXHR)
{   
	var cmbPays = document.getElementById("cmbPays");
    $(data).find("pays").each(function() {
      var pays = new Pays();
      pays.setNom($(this).find("nom").text());
      pays.setPk($(this).find("pk_pays").text());
	  cmbPays.options[cmbPays.options.length] = new Option(pays, JSON.stringify(pays));
    });  
}

/**
 * Méthode appelée lors du retour avec succès de la liste des skieurs
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 * @returns {undefined}
 */
function chargerSkieursSuccess(data, text, jqXHR)
{   
    var txt = '';
    $(data).find("skieur").each(function() {
        var skieur = new Skieur();
        skieur.setNom($(this).find("nom").text());
        skieur.setPosition($(this).find("position").text());
        txt = txt + "<tr><td>" + skieur.getPosition() + "</td><td>" + skieur.toString() + "</td></tr>";

    });  
    document.getElementById("tableContent").innerHTML = txt;
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture des pays
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */
function chargerPaysError(request, status, error) {
  alert("Erreur lors de la lecture des pays: " + error);
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture des skieurs
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */
function chargerSkieursError(request, status, error) {
  alert("Erreur lors de la lecture des skieurs: " + error);
}

/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function() {
  var cmbPays = $("#cmbPays");
  var pays = '';

  $.getScript("javascripts/helpers/dateHelper.js", function() {
    console.log("dateHelper.js chargé !");
  });
  $.getScript("javascripts/beans/pays.js", function() {
    console.log("pays.js chargé !");
  });
  $.getScript("javascripts/beans/skieur.js", function() {
    console.log("skieur.js chargé !");
  });
  $.getScript("javascripts/services/servicesHttp.js", function() {
    console.log("servicesHttp.js chargé !");
    chargerPays(chargerPaysSuccess, chargerPaysError);
  });
  cmbPays.change(function(event) {
    pays = this.options[this.selectedIndex].value;
    chargerSkieurs(JSON.parse(pays).pk, chargerSkieursSuccess, chargerSkieursError);
  });

});

