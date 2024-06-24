<?php

include_once 'wrk/LoginDBManager.php';

class loginManager
{
  private $session;
  private $manager;
  public function __construct($session)
  {
    $this->manager = new WrkLogin();
    $this->session = $session;
  }
  public function login($username, $password)
  {
    //if
    $this->session->set("username", $username);
    return $this->manager->testLogin($username, $password);
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
  public function logOut()
  {
    if ($this->session->destruct()) {
      echo json_encode(
        array(
          'success' => true,
          'message' => 'Session destroy : SUCCESS',
        ),
        JSON_UNESCAPED_UNICODE
      );
      http_response_code(200);
    } else {
      echo json_encode(
        array(
          'success' => false,
          'message' => 'Session destroy : ERROR',
        ),
        JSON_UNESCAPED_UNICODE
      );
      http_response_code(500);
    }


  }


}

?>