<?php

class Instance {

  private $INSTANCE = null;

  function __construct() {
     $this->INSTANCE = array(); 
  }

  public function getInstance() {
      return $this->INSTANCE;
  }

  public function addKV($key, $value) {
	$this->INSTANCE[$key]=$value;
  }
}

?>
