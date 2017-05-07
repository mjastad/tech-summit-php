<?php

class Service{
  private $ABS = '/PrismGateway/services/rest/v2.0';

  function __construct() {

  }

  public function getABS(){
     return $this->ABS;
  }
}

?>
