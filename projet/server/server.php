<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Méthodes autorisées
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type'); // En-têtes autorisés
/*
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
}
*/

include_once('ctrl/LoginManager.php');
include_once('ctrl/CategorieManager.php');
include_once('ctrl/MarqueManager.php');
include_once('ctrl/MotoManager.php');
include_once('ctrl/OptionManager.php');
include_once('ctrl/SessionManager.php');
include_once('ctrl/UserManager.php');

// Vérifier si la requête est bien une requête POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = initVariableFromJson("action");

    switch ($action) {

        case 'login':
            echo 'login';
            // Accéder aux valeurs username et password
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");

            if (isset($username)) {
                if (isset($password)) {

                    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


                    //ctrl login
                    $login = new LoginManager();
                    $res = $login->login($username, $password);

                    echo $res;
                    //$login->createUser($username, $password);

                }
            }
            break;
        case 'createUser':
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");

            if (isset($username)) {
                if (isset($password)) {


                    //ctrl login
                    $usermang = new UserManager($password, $username);
                    echo "";
                    $usermang->__construct($username, $password);


                }
            }
            break;
        default:
            echo "default";
            echo $action;

    }

    // Récupérer les données envoyées par la requête AJAX

    // Faites ce que vous voulez avec les données récupérées
    // Par exemple, vérifier les informations d'identification, accéder à la base de données, etc.

    // Simplement pour l'exemple, renvoyons une réponse JSON avec les données reçues

}
function initVariableFromJson($key)
{
    $data = json_decode(file_get_contents("php://input"), true);

    // Vérifier si la clé existe dans le tableau avant d'y accéder
    if (isset($data[$key])) {
        echo $data[$key];
        return $data[$key];
    } else {

        echo "init";
        // Gérer le cas où la clé n'existe pas, peut-être en renvoyant une valeur par défaut ou en lançant une exception
        return null; // Par exemple, renvoie null si la clé n'existe pas

    }
}


?>