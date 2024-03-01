<?php

class User {
    private $username;
    private $password;
    private $pk_user;

    public function __construct() {
        
    }

    public function initFromDb($data) {
        $this->pk_user = $data["pk_user"];
        $this->username = $data["username"];
        $this->password = $data["password"];
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
}


?>
