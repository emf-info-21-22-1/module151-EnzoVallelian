<?php

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Répondre avec les en-têtes CORS appropriés
    header('Access-Control-Allow-Origin: http://localhost:8081');
    header('Access-Control-Allow-Methods: POST, OPTIONS'); // Méthodes autorisées
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Headers: Content-Type'); // En-têtes autorisés
} else {
//header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://localhost:8081');
header('Access-Control-Allow-Credentials: true');
//connexion ctrl

include_once('ctrl/loginManager.php');
include_once('ctrl/categorieManager.php');
include_once('ctrl/marqueManager.php');
include_once('ctrl/motoManager.php');
include_once('ctrl/optionManager.php');
include_once('ctrl/sessionManager.php');
include_once('ctrl/userManager.php');


// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données envoyées par la requête AJAX
    $data = json_decode(file_get_contents("php://input"), true);

    // Accéder aux valeurs username et password
    $username = $data['username'];
    $password = $data['password'];

    // Faites ce que vous voulez avec les données récupérées
    // Par exemple, vérifier les informations d'identification, accéder à la base de données, etc.

    // Simplement pour l'exemple, renvoyons une réponse JSON avec les données reçues
    echo json_encode($data);
} else {
    // Si la requête n'est pas une requête POST, renvoyer une réponse d'erreur
    http_response_code(405); // Méthode non autorisée
    echo json_encode(array("message" => "Méthode non autorisée. Seules les requêtes POST sont acceptées."));
}

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'checkUser':
            if (isset($_POST['username'])) {
                if (isset($_POST['password'])) {

                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $hashedPassword = password_hash($password,PASSWORD_DEFAULT);


                    //ctrl login
                    $login = new LoginManager();
                    //$login->createUser($username, $password);

                }
            }
            break;
        case 'createUser':
            if (isset($_POST['username'])) {
                if (isset($_POST['password'])) {

                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    //ctrl login
                    $login = new LoginManager();
                   // $login->createUser($username, $password);

                }
            }
            break;
    }
}

}