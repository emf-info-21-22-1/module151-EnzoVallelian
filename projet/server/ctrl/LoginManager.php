<?php

include_once 'wrk/LoginDBManager.php';

class loginManager
{


  private $manager;
  public function __construct()
  {
    $this->manager = new WrkLogin();
  }

  public function login($username, $password)
  {

    $this->manager->startSession();

    return $this->manager->testLogin($username, $password);

  }


}

?>