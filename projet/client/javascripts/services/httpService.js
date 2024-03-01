

var BASE_URL = "http://localhost:8082/";
// httpService.js
function login(username, password, successCallback, errorCallback) {
    // Envoi de la requête POST via AJAX
    $.ajax({
        type: "POST",
        url: BASE_URL + "server.php",
        data: {
            "action": "checkUser",
            "username": username,
            "password": password,
           
        },
        contentType: "application/json", xhrFields: {
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
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: BASE_URL + "login.php",
        data: {
            "action": "createUser",
            "username": username,
            "password": passwd
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}



