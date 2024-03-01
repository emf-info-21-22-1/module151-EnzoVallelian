

// httpService.js
var BASE_URL = "http://localhost:8082/";

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
        dataType:"json",
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
 * @param {string} passwd Mot de passe de l'utilisateur.
 * @param {function} successCallback Fonction de callback en cas de succès de la requête.
 * @param {function} errorCallback Fonction de callback en cas d'erreur de la requête.
 */
function createUserAjax(username, passwd, successCallback, errorCallback) {

    let data = {
        action: "createUser",
        username: username,
        password: password
    }

    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL + "login.php",
        contentType: "application/json",
        data: JSON.stringify(data),
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}



