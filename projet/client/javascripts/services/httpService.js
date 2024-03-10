

// httpService.js
var BASE_URL = "https://valleliane.emf-informatique.ch/151/server";

function login(username, password, successCallback, errorCallback) {

    let data = {
        action: "login",
        username: username,
        password: password
    }

    // Envoi de la requête POST via AJAX
    $.ajax({
        type: "POST",
        url: BASE_URL + "server.php",
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify(data),
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}


/**
 * Fonction permettant de créer un utilisateur.
 * @param {string} username Nom d'utilisateur de l'utilisateur.
 * @param {string} password Mot de passe de l'utilisateur.
 * @param {function} successCallback Fonction de callback en cas de succès de la requête.
 * @param {function} errorCallback Fonction de callback en cas d'erreur de la requête.
 */

function createUserAjax(username, password, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        contentType: "application/json", // Définir le type de contenu comme JSON
        url: BASE_URL + "server.php",
        data: JSON.stringify({
            action: "createUser",
            username: username,
            password: password
        }), // Convertir les données en JSON
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}



function getallMoto(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            "action": "getallMoto"
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });}


    function logOut(successCallback, errorCallback) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: BASE_URL + "server.php",
            data: {
                "action": "logout"
            },
            xhrFields: {
                withCredentials: true
            },
            success: successCallback,
            error: errorCallback
        });
    }
