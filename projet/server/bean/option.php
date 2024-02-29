<?php


class option {
  private $id;
  private $packOption;

  public function __construct($id, $packOption) {
      $this->id = $id;
      $this->packOption = $packOption;
  }

  public function getId() {
      return $this->id;
  }

  public function getPackOption() {
      return $this->packOption;
  }
}





?>