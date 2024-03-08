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
            
            // Accéder aux valeurs username et password
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");

            if (isset($username)) {
                if (isset($password)) {

                    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


                    //ctrl login
                    $login = new LoginManager();
                    $res = $login->login($username, $password);

                    
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
                    $usermang = new UserManager($username,$password);
                  
                   


                }
            }
            break;
        default:
            echo "default";
            echo $action;

    }

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
        return null; 

    }
}


?>