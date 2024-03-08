<?php


class option {
  private $id;
  private $packOption;

  public function __construct() {
      
  }

  public function getId() {
      return $this->id;
  }

  public function getPackOption() {
      return $this->packOption;
  }

  public function initFromDb($data) {
    $this->pk_option = $data["pk_option"];
    $this->pack_option = $data["pack_option"];
    
}
}





?>