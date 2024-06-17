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

function getAllOptions(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "getAllOptions"
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function getOptionsByMotoId(motoId, successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "getOptionsByMotoId",
            motoId: motoId
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function getAllCategories(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "getAllCategories"
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}

function getAllMarques(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "getAllMarques"
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}
function getAllMotoByUser(userId, successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: BASE_URL + "server.php",
        data: {
            action: "getAllMotoByUser",
            userId: userId
        },
        xhrFields: {
            withCredentials: true
        },
        success: successCallback,
        error: errorCallback
    });
}
