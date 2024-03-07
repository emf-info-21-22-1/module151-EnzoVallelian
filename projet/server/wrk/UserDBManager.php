<?php
include_once "Connexion.php";
// Créer une instance de Connexion
$connexion = Connexion::getInstance();

// Créer une instance de UserDBManager en lui passant la connexion
$userDBManager = new UserDBManager($connexion);


class UserDBManager {
    private $connexion;

    public function __construct($connexion) {
        // Prenez la connexion en paramètre plutôt que de l'instancier ici
        $this->connexion = $connexion;
    }

    public function createUser($username, $password) {
        htmlspecialchars($username, ENT_QUOTES, "");
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $query = "INSERT INTO t_user (Username, Password) VALUES (:username, :password)";
        $params = array('username' => $username, 'password' => $hashedPassword);
        
        // Utilisez la connexion pour exécuter la requête
        $this->connexion->executeQuery($query, $params);

        // Vous pouvez retourner un message ou une indication de succès si nécessaire
    }
}




?>