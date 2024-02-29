<?php

class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
}

// Exemple d'utilisation
$user = new User("utilisateur123", "motdepasse456");
echo "Nom d'utilisateur : " . $user->getUsername() . "\n";
echo "Mot de passe : " . $user->getPassword() . "\n";

?>
