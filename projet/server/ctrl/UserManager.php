<?php
include_once "wrk/UserDBManager.php";

class UserManager{
    private $wrk;



    public function __construct($password,$username){


        $wrk = new UserDBManager();
        $wrk ->createUser($password,$username);
    }

}




?>