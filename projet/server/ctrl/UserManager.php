<?php
include_once "wrk/UserDBManager.php";

class UserManager
{
    private $wrk;

    public function __construct( $username,$password)
    {
        // Créez une instance de UserDBManager
        $this->wrk = new UserDBManager();
       
        
        // Appelez la méthode pour créer un utilisateur avec le nom d'utilisateur et le mot de passe fournis
        $this->wrk->createUser($username, $password);
            
    }
}




?>