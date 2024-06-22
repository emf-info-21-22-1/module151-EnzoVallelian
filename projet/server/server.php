<?php

// Configuration des en-têtes HTTP pour permettre les requêtes CORS
header('Access-Control-Allow-Origin: https://valleliane.emf-informatique.ch/151/client');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type');

include_once ('ctrl/LoginManager.php');
include_once ('ctrl/MotoManager.php');
include_once ('ctrl/SessionManager.php');
include_once ('ctrl/UserManager.php');

$session = new SessionManager();
$login = new LoginManager($session);
$motoManag = new MotoManager();

// Vérification du type de requête HTTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = initVariableFromJson("action");

    switch ($action) {
        case 'login':
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");
            if (isset($username) && isset($password)) {
                $res = $login->login($username, $password);
            }
            break;
        case 'createUser':
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");
            if (isset($username) && isset($password)) {
                $usermang = new UserManager($username, $password);
                http_response_code(200);
            } else {
                http_response_code(401);
            }
            break;
        case 'addMoto':
            $usernameTest = $session->get('username');
            if ($usernameTest !== null) {
                $cc = initVariableFromJson("cc");
                $hp = initVariableFromJson("hp");
                $weight = initVariableFromJson("weight");
                $name = initVariableFromJson("name");
                if ($cc && $hp && $weight && $name) {
                    $result = $motoManag->addMoto($cc, $hp, $weight, $name);
                    if ($result) {
                        http_response_code(200);
                        echo $result;
                    } else {
                        http_response_code(500);
                        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la moto.']);
                    }
                } else {
                    http_response_code(400);
                    echo json_encode(['success' => false, 'message' => 'Données de la moto manquantes ou vides. server.php']);
                }
            } else {
                http_response_code(403);
                echo json_encode(['success' => false, 'message' => 'Accès non autorisé.']);
            }
            break;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $action = initVariableFromUrl("action");

    switch ($action) {
        case 'logOut':
            $login->logOut();
            break;
        case 'getAllOptions':
            $res = $optionManag->getAllOptions();
            echo json_encode($res);
            http_response_code(200);
            break;
        case 'getOptionsByMotoId':
            $motoId = initVariableFromJson("motoId");
            if ($motoId !== null) {
                $res = $optionManag->getOptionsByMotoId($motoId);
                echo json_encode($res);
                http_response_code(200);
            } else {
                echo json_encode(['error' => 'Moto ID is missing']);
                http_response_code(401);
            }
            break;
        case 'getAllCategories':
            $res = $categorieManag->getAllCategories();
            http_response_code(200);
            echo json_encode($res);
            break;
        case 'getAllMarques':
            $res = $marqueManag->getAllMarques();
            http_response_code(200);
            echo json_encode($res);
            break;
        case 'getAllMotoByUser':
            $userId = initVariableFromJson("userId");
            if ($userId !== null) {
                $res = $motoManag->getAllMotoByUser($userId);
                echo json_encode($res);
            } else {
                http_response_code(401);
                echo json_encode(['error' => 'User ID is missing']);
            }
            break;
        case "getallMoto":
            $usernameTest = $session->get('username');
            if ($usernameTest !== null) {
                $res = $motoManag->getAllMoto($usernametest);
                http_response_code(200);
                echo json_encode($res);
            } else {
                http_response_code(401);
            }
            break;
        default:
            echo "default";
    }
}
/**
 * Fonction pour initialiser une variable à partir d'un objet JSON envoyé dans le corps de la requête.
 *
 * @param string $key La clé de la variable à extraire de l'objet JSON.
 * @return mixed La valeur de la variable extraite, ou null si la clé n'est pas trouvée.
 */
function initVariableFromJson($key)
{
    // Récupère les données JSON brutes envoyées dans le corps de la requête HTTP
    $data = json_decode(file_get_contents("php://input"), true);

    // Vérifie si la clé spécifiée existe dans le tableau des données JSON décodées
    // Si la clé existe, retourne sa valeur correspondante, sinon retourne null
    return isset($data[$key]) ? $data[$key] : null;
}
/**
 * Fonction pour initialiser une variable à partir des paramètres de l'URL.
 *
 * @param string $key La clé de la variable à extraire des paramètres de l'URL.
 * @return mixed La valeur de la variable extraite, ou null si la clé n'est pas trouvée.
 */
function initVariableFromUrl($key)
{
    // Vérifie si la clé spécifiée existe dans les paramètres de l'URL
    // Si la clé existe, retourne sa valeur correspondante, sinon retourne null
    return isset($_GET[$key]) ? $_GET[$key] : null;
}



?>
