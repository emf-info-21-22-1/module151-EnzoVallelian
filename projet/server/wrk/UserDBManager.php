<?php
include_once "Connexion.php";
class UserDBManager
{
    private $connexion;
    function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }
    public function startSession()
    {
       // session_start();
    }

    public function createUser($username, $password)
    {
        $query = "SELECT * FROM t_user WHERE username=:username";
        $params = array("username" => $username);
        $isUsernameTaken = $this->connexion->selectSingleQuery($query, $params);
        if (!$isUsernameTaken) {
            $query = "INSERT INTO t_user (username, password) VALUES (:username, :password)";
            $password = htmlspecialchars($password);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $params = array('username' => htmlspecialchars($username), 'password' => $hashedPassword);
            $this->connexion->executeQuery($query, $params);
            $pkUser = $this->connexion->getLastId('t_user');
            $response = array(
                'success' => true,
                'pk' => $pkUser,
                'username' => $username
            );
        } else {
            $response = array(
                'success' => false,
                'message' => "Ce nom d'utilisateur n'est pas disponible"
            );
        }
      //  header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        return $response;
    }



    public function stopSession()
    {
        $bool = false;
        if (isset($_SESSION['user'])) {
            session_destroy();
            $bool = true;
        }
        return $bool;
    }
    public function isConnected()
    {
        return(isset($_SESSION['user']));
    }
}




?>