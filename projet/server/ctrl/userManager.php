<?php

class userManager
{

    public function createUser($username, $password)
    {
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insérer l'utilisateur dans la base de données
        $query = "INSERT INTO t_user (Username, Password) VALUES (:username, :password)";
        $params = array('username' => $username, 'password' => $hashedPassword);
        $this->connexion->executeQuery($query, $params);

        // Vous pouvez retourner un message ou une indication de succès si nécessaire
    }
}




?>