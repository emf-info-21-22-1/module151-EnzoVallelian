// httpService.js
var BASE_URL = "https://valleliane.emf-informatique.ch/151/server/";

function login(username, password, successCallback, errorCallback) {
    let data = {
        action: "login",
        username: username,
        password: password
    };

    // Envoi de la requête POST via AJAX
    $.ajax({
        type: "POST",
        url: BASE_URL + "server.php",
        contentType: "application/json",
        dataType: "JSON",
        data: JSON.stringify(data),
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function createUser(username, password, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        contentType: "application/json",
        url: BASE_URL + "server.php",
        data: JSON.stringify({
            action: "createUser",
            username: username,
            password: password
        }),
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
        url: BASE_URL + "server.php?action=getallMoto",

        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function logOut(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "logOut"
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function addMoto(cc, hp, weight, fk_marque, fk_categorie, name, successCallback, errorCallback) {
    let data = {
        action: "addMoto",
        cc: cc,
        hp: hp,
        weight: weight,
        fk_marque: fk_marque,
        fk_categorie: fk_categorie,
        name: name
    };

    $.ajax({
        type: "POST",
        url: BASE_URL + "server.php/addMoto",
        contentType: "application/json",
        dataType: "JSON",
        data: JSON.stringify(data),
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}
