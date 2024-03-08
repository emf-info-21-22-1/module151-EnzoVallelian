<?php

include_once 'wrk/LoginDBManager.php';

class loginManager
{

private $session;
  private $manager;
  public function __construct($session)
  {
    $this->manager = new WrkLogin($session);
    $this->session = $session;
  }

  public function login($username, $password)
  {

    
    
    return $this->manager->testLogin($username, $password);

  }


}

?>