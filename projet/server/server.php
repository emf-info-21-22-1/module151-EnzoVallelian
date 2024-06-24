<?php

// Configuration des en-têtes HTTP pour permettre les requêtes CORS
header('Access-Control-Allow-Origin: https://valleliane.emf-informatique.ch/151/client'); // Autorise les requêtes CORS depuis cette origine spécifique
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Autorise les méthodes HTTP POST, GET et OPTIONS
header('Access-Control-Allow-Credentials: true'); // Permet l'envoi de cookies avec les requêtes
header('Access-Control-Allow-Headers: Content-Type'); // Autorise le header Content-Type

// Inclusion des fichiers nécessaires
include_once('ctrl/LoginManager.php');
include_once('ctrl/MotoManager.php');
include_once('ctrl/SessionManager.php');
include_once('ctrl/UserManager.php');

// Initialisation des gestionnaires de session, de connexion et de moto
$session = new SessionManager(); // ICI créatiion de la session
$login = new LoginManager($session); //PLUS TARD set de session 
$motoManag = new MotoManager();

// Vérification du type de requête HTTP
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'action à partir des données JSON envoyées dans le corps de la requête
    $action = initVariableFromJson("action");

    switch ($action) {
        case 'login':
            // Récupération des variables username et password
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");
            if (isset($username) && isset($password)) {
                // Tentative de connexion
                $res = $login->login($username, $password);
                if ($res) {
                    http_response_code(200); // Succès de la connexion
                } else {
                    http_response_code(401); // Échec de la connexion
                    echo json_encode(['error' => 'Login failed']);
                }
            } else {
                http_response_code(400); // Nom d'utilisateur ou mot de passe manquant
                echo json_encode(['error' => 'Missing username or password']);
            }
            break;

        case 'createUser':
            // Récupération des variables username et password
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");
            if (isset($username) && isset($password)) {
                // Création d'un nouvel utilisateur
                $usermang = new UserManager($username, $password);
                http_response_code(200); // Utilisateur créé avec succès
            } else {
                http_response_code(400); // Nom d'utilisateur ou mot de passe manquant
                echo json_encode(['error' => 'Missing username or password']);
            }
            break;

        case 'addMoto':
            // Vérification de la session utilisateur
            $usernameTest = $session->get('username');
            if ($usernameTest !== null) {
                // Récupération des données de la moto
                $cc = initVariableFromJson("cc");
                $hp = initVariableFromJson("hp");
                $weight = initVariableFromJson("weight");
                $name = initVariableFromJson("name");
                if ($cc && $hp && $weight && $name) {
                    // Ajout de la moto
                    $result = $motoManag->addMoto($cc, $hp, $weight, $name);
                    if ($result) {
                        http_response_code(200); // Moto ajoutée avec succès
                        echo $result;
                    } else {
                        http_response_code(500); // Erreur lors de l'ajout de la moto
                        echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la moto.']);
                    }
                } else {
                    http_response_code(400); // Données de la moto manquantes ou vides
                    echo json_encode(['success' => false, 'message' => 'Données de la moto manquantes ou vides.']);
                }
            } else {
                http_response_code(403); // Accès non autorisé
                echo json_encode(['success' => false, 'message' => 'Accès non autorisé.']);
            }
            break;

        default:
            http_response_code(400); // Action invalide
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Récupération de l'action à partir des paramètres de l'URL
    $action = initVariableFromUrl("action");

    switch ($action) {
        case 'logOut':
            // Déconnexion de l'utilisateur
            $login->logOut();
            http_response_code(200); // Déconnexion réussie
            echo json_encode(['success' => 'Logged out successfully']);
            break;

        case "getallMoto":
            // Vérification de la session utilisateur
            $usernameTest = $session->get('username');
            if ($usernameTest !== null) {
                // Récupération de toutes les motos de l'utilisateur
                $res = $motoManag->getAllMoto($usernameTest);
                http_response_code(200); // Récupération réussie
                echo json_encode($res);
            } else {
                http_response_code(403); // Accès non autorisé
                echo json_encode(['error' => 'Unauthorized access']);
            }
            break;

        default:
            http_response_code(400); // Action invalide
            echo json_encode(['error' => 'Invalid action']);
            break;
    }
} else {
    http_response_code(405); // Méthode non autorisée
    echo json_encode(['error' => 'Method Not Allowed']);
}

/**
 * Fonction pour initialiser une variable à partir d'un objet JSON envoyé dans le corps de la requête.
 *
 * @param string $key La clé de la variable à extraire de l'objet JSON.
 * @return mixed La valeur de la variable extraite, ou null si la clé n'est pas trouvée.
 */
function initVariableFromJson($key)
{
    $data = json_decode(file_get_contents("php://input"), true); // Décodage des données JSON
    return isset($data[$key]) ? $data[$key] : null; // Retourne la valeur si elle existe, sinon null
}

/**
 * Fonction pour initialiser une variable à partir des paramètres de l'URL.
 *
 * @param string $key La clé de la variable à extraire des paramètres de l'URL.
 * @return mixed La valeur de la variable extraite, ou null si la clé n'est pas trouvée.
 */
function initVariableFromUrl($key)
{
    return isset($_GET[$key]) ? $_GET[$key] : null; // Retourne la valeur si elle existe, sinon null
}

?>
