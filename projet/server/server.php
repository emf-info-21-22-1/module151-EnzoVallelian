<?php

header('Access-Control-Allow-Origin: https://valleliane.emf-informatique.ch/151/client');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS'); // Méthodes autorisées
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Content-Type'); // En-têtes autorisés


include_once ('ctrl/LoginManager.php');
include_once ('ctrl/CategorieManager.php');
include_once ('ctrl/MarqueManager.php');
include_once ('ctrl/MotoManager.php');
include_once ('ctrl/OptionManager.php');
include_once ('ctrl/SessionManager.php');
include_once ('ctrl/UserManager.php');

$session = new SessionManager();
$login = new LoginManager($session);
$motoManag = new MotoManager($session);
$optionManag = new OptionManager();
$categorieManag = new CategorieManager();
$marqueManag = new MarqueManager();
// Vérifier si la requête est bien une requête POST ou GET 
if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "PUT") {
    $action = initVariableFromJson("action");

    switch ($action) {

        case 'login':
            // Accéder aux valeurs username et password
            $username = initVariableFromJson("username");
            $password = initVariableFromJson("password");
            if (isset($username)) {
                if (isset($password)) {
                    //ctrl login
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
                    $usermang = new UserManager($username, $password);
                    http_response_code(200);
                }
            } else {
                http_response_code(401);


            }
            break;
        case 'addMoto':


            $cc = initVariableFromJson("cc");
            $hp = initVariableFromJson("hp");
            $weight = initVariableFromJson("weight");
            $fk_marque = initVariableFromJson("fk_marque");
            $fk_categorie = initVariableFromJson("fk_categorie");
            $name = initVariableFromJson("name");
            if (isset($cc)) {
                if (isset($hp)) {
                    if (isset($weight)) {
                        if (isset($fk_marque)) {
                            if (isset($fk_categorie)) {
                                if (isset($name)) {
                                    $result = $motoManag->addMoto($cc, $hp, $weight, $fk_marque, $fk_categorie, $name);
                                }
                            }
                        }
                    }

                }
            }
            // Récupérer les données de la moto depuis le corps de la requête


            // Vérifier si les données de la moto sont présentes et non vides
            if (!empty($result)) {
                // Appeler la méthode pour ajouter la moto dans la base de données
                $result = $motoManag->addMoto($cc, $hp, $weight, $fk_marque, $fk_categorie, $name);

                // Vérifier si l'ajout de la moto s'est bien passé
                if ($result) {
                    http_response_code(200);
                    echo json_encode(['success' => true, 'message' => 'Moto ajoutée avec succès.']);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Erreur lors de l\'ajout de la moto.']);
                }
            } else {
                // Gérer le cas où les données de la moto ne sont pas présentes ou vides
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Données de la moto manquantes ou vides.']);
            }
            break;

    }

} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {

    //$action = initVariableFromJson("action");
    $action = initVariableFromUrl("action");

    switch ($action) {

        case 'logOut':
            
            if ($session->destruct()) {
                echo json_encode(
                    array(
                        'success' => true,
                        // 'message' => 'Session destroy : SUCCESS', cela depend de que cela vaut "   if ($session->destruct()) {"
                        'message' => 'Session destroy : success',
                    ),
                    JSON_UNESCAPED_UNICODE
                );
            } else {
                echo json_encode(
                    array(
                        'success' => false,
                        // 'message' => 'Session destroy : ERROR', cela depend de que cela vaut "   if ($session->destruct()) {"
                        'message' => 'Session destroy : error',
                    ),
                    JSON_UNESCAPED_UNICODE
                );
                http_response_code(500);
            }
            //$user->ctrlLogout();
            break;
        case 'getAllOptions':
            // Appelle la méthode pour récupérer toutes les options
            $res = $optionManag->getAllOptions();
            // Retourne le résultat au format JSON
            echo json_encode($res);
            http_response_code(200);
            break;

        case 'getOptionsByMotoId':
            // Vérifie si l'ID de la moto est passé en paramètre
            $motoId = initVariableFromJson("motoId");
            if ($motoId !== null) {
                // Appelle la méthode pour récupérer les options de la moto spécifiée
                $res = $optionManag->getOptionsByMotoId($motoId);
                // Retourne le résultat au format JSON
                echo json_encode($res);
                http_response_code(200);
            } else {
                // Gestion de l'erreur si l'ID de la moto n'est pas fourni
                echo json_encode(['error' => 'Moto ID is missing']);
                http_response_code(401);
            }
            break;
        case 'getAllCategories':
            // Appelle la méthode pour récupérer toutes les catégories
            $res = $categorieManag->getAllCategories();
            // Retourne le résultat au format JSON
            http_response_code(200);
            echo json_encode($res);
            break;
        case 'getAllMarques':
            // Appelle la méthode pour récupérer toutes les marques
            $res = $marqueManag->getAllMarques();
            // Retourne le résultat au format JSON
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
                echo json_encode($res); // Assurez-vous que la réponse est encodée en JSON
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