<?php
include_once('Connexion.php');
include_once('bean/user.php');

class WrkLogin
{
    private $connexion;
    private $session;

    /**
     * Constructeur de la class WrkLogin.
     * le constructeur permet d'instancier la connexion à la DB.
     * 
     */
    function __construct($session)
    {
        $this->connexion = Connexion::getInstance();
        $this->session = $session;
    }

    /**
     * Permet de démarrer la session d'un utilisateur.
     *
     * 
     */



    public function testLogin($username, $password)
    {
        $json = "";
        $query = "SELECT * FROM t_user WHERE username=:username";
        $params = array('username' => htmlspecialchars($username));
        $res = $this->connexion->selectQuery($query, $params);

        // Vérifier l'existance de l'utilisateur
        if (!empty($res)) {
            $user = new User();
            $userData = $res[0]; // Première ligne de résultat
            $user->initFromDb($userData);

            $hashPassword = $user->getPassword();

            if (password_verify($password, $hashPassword)) {
                // Le mot de passe est correct
                // Autoriser l'accès ou effectuer d'autres actions nécessaires

                $response = array(
                    'success' => true,
                    'message' => 'Mot de passe correct !'
                );
             
                $this->session->set("username", $username);
                http_response_code(200);
                $json = json_encode($response, JSON_UNESCAPED_UNICODE);

            } else {
                // Le mot de passe est incorrect
                // Gérer l'accès refusé ou afficher un message d'erreur
                $response = array(
                    'success' => false,
                    'message' => 'Mot de passe incorrect !'
                );
                http_response_code(401);
                $json = json_encode($response, JSON_UNESCAPED_UNICODE);

            }




        } else {
            $response = array(
                'success' => false,
                'message' => 'utilisateur pas trouver!'
                
            );
            http_response_code(401);
            $json = json_encode($response, JSON_UNESCAPED_UNICODE);
        }
        echo $json;
        return $user;
    }

    /**
     * Permet de deconnecter un utilisateur en détruissant la session.
     *
     * @return boolean la déconnexion à réussi.
     * 
     */
    public function deconect()
    {
        $bool = false;
        if (isset($_SESSION['pk_user'])) {
            session_destroy();
            $bool = true;
        }
        return $bool;
    }

    /**
     * test si l'utilisateur et connecté.
     *
     * @return boolean isset session.
     * 
     */
    public function isConnected()
    {
        return(isset($_SESSION['pk_user']));
    }
}
?>