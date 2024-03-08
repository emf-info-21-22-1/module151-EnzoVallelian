<?php
include_once('Connexion.php');
include_once('bean/user.php');

class WrkLogin
{
    private $connexion;

    /**
     * Constructeur de la class WrkLogin.
     * le constructeur permet d'instancier la connexion à la DB.
     * 
     */
    function __construct()
    {
        $this->connexion = Connexion::getInstance();
    }

    /**
     * Permet de démarrer la session d'un utilisateur.
     *
     * 
     */
    public function startSession()
    {
       // session_start();
    }

    /**
     * Permet de checker le login et le password d'un utilisateur pour qu'il puisse se connecter.
     *
     * @param mixed $username nom d'utilisateur
     * @param mixed $password mot de passe
     * 
     * @return String du username
     * 
     */

     /*
    public function testLogin($username, $password)
    {

        $query = "SELECT * FROM t_user where username=:username";
        $params = array('username' => htmlspecialchars($username));
        $res = $this->connexion->selectQuery($query, $params);
        

        //Vérifier l'existance du user
        if ($res) {

            $user = new User();
            $user->initFromDb($res);
            
            $hashPassword = $user->getPassword();

            if (password_verify($password, $hashPassword)) {
                // Le mot de passe est correct
                // Autoriser l'accès ou effectuer d'autres actions nécessaires
                echo 'Mot de passe correct !';
            } else {
                // Le mot de passe est incorrect
                // Gérer l'accès refusé ou afficher un message d'erreur
                echo 'Mot de passe incorrect !';
            }

        } else {
            echo 'pas trouver';

        }
        return $user;
    }*/
    public function testLogin($username, $password)
    {
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
                echo 'Mot de passe correct !';
            } else {
                // Le mot de passe est incorrect
                // Gérer l'accès refusé ou afficher un message d'erreur
                echo 'Mot de passe incorrect !';
            }
        } else {
            echo 'Utilisateur non trouvé';
        }
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
        return (isset($_SESSION['pk_user']));
    }
}
?>