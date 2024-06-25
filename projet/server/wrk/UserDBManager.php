<?php
include_once "Connexion.php"; // Inclut le fichier Connexion.php une seule fois, qui doit contenir la classe Connexion

class UserDBManager
{
    private $connexion; // Attribut pour la connexion à la base de données


    function __construct()
    {
        $this->connexion = Connexion::getInstance(); // Initialise la connexion à la base de données en utilisant le pattern singleton
    }

    public function createUser($username, $password)
    {
        if($username==null){
         $response = array(
                'success' => false,
                'message' => "le nom d'utilisateur ne peux pas etre vide"
            
        }
        $json = ""; // Variable pour stocker la réponse JSON
        $query = "SELECT * FROM t_user WHERE username=:username"; // Requête SQL pour vérifier si le nom d'utilisateur existe déjà
        $params = array("username" => $username); // Paramètres de la requête SQL
        $isUsernameTaken = $this->connexion->selectSingleQuery($query, $params); // Exécute la requête et vérifie si le nom d'utilisateur est déjà pris

        if (!$isUsernameTaken) {
            // Si le nom d'utilisateur n'est pas pris, on insère un nouvel utilisateur
            $query = "INSERT INTO t_user (username, password) VALUES (:username, :password)"; // Requête SQL d'insertion
            $password = htmlspecialchars($password); // Échappe les caractères spéciaux dans le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash le mot de passe
            /*

             */
            $params = array('username' => htmlspecialchars($username), 'password' => $hashedPassword); // Paramètres de la requête SQL avec le mot de passe hashé
            $this->connexion->executeQuery($query, $params); // Exécute la requête d'insertion

            $pkUser = $this->connexion->getLastId('t_user'); // Récupère l'ID du dernier utilisateur inséré
            $response = array(
                'success' => true,
                'pk' => $pkUser,
                'username' => $username,
                'message' => 'compte creer'
            ); // Prépare la réponse JSON en cas de succès

            $json = json_encode($response, JSON_UNESCAPED_UNICODE); // Encode la réponse en JSON
        } else {
            // Si le nom d'utilisateur est déjà pris, prépare une réponse d'erreur
            http_response_code(401); // Définit le code de réponse HTTP à 401 (Unauthorized)
            $response = array(
                'success' => false,
                'message' => "Ce nom d'utilisateur n'est pas disponible"
            ); // Prépare la réponse JSON en cas d'erreur
            $json = json_encode($response, JSON_UNESCAPED_UNICODE); // Encode la réponse en JSON
        }

        echo $json; // Affiche la réponse JSON
        return $response; // Retourne la réponse (tableau associatif)
    }
}
?>
